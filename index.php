<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check for MD files
$files = glob('*.md');
if (empty($files)) {
    die('Error: No MD files found in the current directory');
}

// Determine the current file
$currentFile = isset($_GET['file']) ? $_GET['file'] : 'README.md';

// Check that the file exists
if (!in_array($currentFile, $files)) {
    $currentFile = 'README.md';
}

// Check if the file is readable
if (!is_readable($currentFile)) {
    die('Error: Cannot read file ' . $currentFile);
}

// Get file content
$content = file_get_contents($currentFile);
if ($content === false) {
    die('Error: Failed to get file content ' . $currentFile);
}

// Convert Markdown to HTML
function parseMarkdown($markdown) {
    // Protect code blocks (using a more greedy expression to capture multiple lines of code)
    $codeBlocks = [];
    $markdown = preg_replace_callback('/```(.*?)\n([\s\S]*?)```/s', function($matches) use (&$codeBlocks) {
        $language = trim($matches[1]);
        $code = htmlspecialchars($matches[2]);
        $index = count($codeBlocks);
        $codeBlocks[$index] = [
            'language' => $language,
            'code' => $code
        ];
        // Use a unique token with unlikely characters
        return "<!-CODE-BLOCK-TOKEN-$index-!>";
    }, $markdown);
    
    // Protect inline code (more precise expression)
    $inlineCodes = [];
    $markdown = preg_replace_callback('/`([^`\n]+?)`/', function($matches) use (&$inlineCodes) {
        $index = count($inlineCodes);
        $inlineCodes[$index] = htmlspecialchars($matches[1]);
        // Use a unique token with unlikely characters
        return "<!-INLINE-CODE-TOKEN-$index-!>";
    }, $markdown);
    
    // Process headers
    $markdown = preg_replace_callback('/^(#{1,6})\s+(.*)$/m', function($matches) {
        $level = strlen($matches[1]);
        $text = trim($matches[2]);
        $id = strtolower(preg_replace('/[^a-z0-9]+/', '-', $text));
        $id = trim($id, '-');
        return "<h$level id=\"$id\">$text</h$level>";
    }, $markdown);
    
    // Process links to MD files
    $markdown = preg_replace_callback('/\[([^\]]+)\]\(([^)]+\.md)(#[^)]*)?\)/', function($matches) {
        $text = $matches[1];
        $href = $matches[2];
        $anchor = isset($matches[3]) ? $matches[3] : '';
        return "<a href=\"?file=" . urlencode($href) . "$anchor\">$text</a>";
    }, $markdown);
    
    // Regular links
    $markdown = preg_replace('/\[([^\]]+)\]\(([^)]+)\)/', '<a href="$2" target="_blank">$1</a>', $markdown);
    
    // Images
    $markdown = preg_replace('!\!\[([^\]]*)\]\((.*?)\s*(".*")?\)!', '<img src="$2" alt="$1" class="img-fluid">', $markdown);
    
    // Bold text
    $markdown = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $markdown);
    $markdown = preg_replace('/\_\_(.*?)\_\_/', '<strong>$1</strong>', $markdown);
    
    // Italic text
    $markdown = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $markdown);
    $markdown = preg_replace('/\_(.*?)\_/', '<em>$1</em>', $markdown);
    
    // Horizontal line
    $markdown = preg_replace('/^\s*[-*_]{3,}\s*$/m', '<hr>', $markdown);
    
    // Lists
    $markdown = preg_replace('/^\s*[-*]\s+(.*?)$/m', '<li>$1</li>', $markdown);
    $markdown = preg_replace('/(<li>.*?<\/li>(\s*<li>.*?<\/li>)*)/s', '<ul>$1</ul>', $markdown);
    
    // Numbered lists
    $markdown = preg_replace('/^\s*(\d+)\.\s+(.*?)$/m', '<li>$2</li>', $markdown);
    $markdown = preg_replace_callback('/(<li>.*?<\/li>(\s*<li>.*?<\/li>)*)/s', function($matches) {
        // Check if this is a numbered list or a regular list
        if (preg_match('/^\s*\d+\.\s+/', $matches[0])) {
            return '<ol>' . $matches[1] . '</ol>';
        }
        return $matches[0]; // Return unchanged
    }, $markdown);
    
    // Paragraphs (only if not a list or heading)
    $markdown = preg_replace_callback('/^([^<\s].+)$/m', function($matches) {
        $line = $matches[1];
        // Don't wrap in <p> if the line already contains HTML tags
        if (preg_match('/^<(h\d|ul|ol|li|table|blockquote|pre|img)/', $line)) {
            return $line;
        }
        return "<p>$line</p>";
    }, $markdown);
    
    // Restore code blocks
    $markdown = preg_replace_callback('/<!-CODE-BLOCK-TOKEN-(\d+)-!>/', function($matches) use ($codeBlocks) {
        $index = $matches[1];
        if (!isset($codeBlocks[$index])) {
            return $matches[0]; // In case of error, return the original text
        }
        $block = $codeBlocks[$index];
        $language = $block['language'];
        $code = $block['code'];
        $languageClass = $language ? " class=\"language-$language\"" : "";
        return "<pre><code$languageClass>$code</code></pre>";
    }, $markdown);
    
    // Restore inline code
    $markdown = preg_replace_callback('/<!-INLINE-CODE-TOKEN-(\d+)-!>/', function($matches) use ($inlineCodes) {
        $index = $matches[1];
        if (!isset($inlineCodes[$index])) {
            return $matches[0]; // In case of error, return the original text
        }
        $code = $inlineCodes[$index];
        return "<code>$code</code>";
    }, $markdown);
    
    return $markdown;
}

// Convert Markdown to HTML
$html = parseMarkdown($content);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Python Questions Documentation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- highlight.js for syntax highlighting -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            overflow-y: auto;
        }
        .content {
            margin-left: 240px;
            padding: 20px;
        }
        @media (max-width: 767.98px) {
            .content {
                margin-left: 0;
            }
            .sidebar {
                position: static;
                height: auto;
                padding-top: 20px;
            }
        }
        .nav-link {
            color: #333;
            padding: 0.5rem 1rem;
        }
        .nav-link.active {
            background-color: #e9ecef;
            color: #007bff;
        }
        .nav-link:hover {
            color: #007bff;
            background-color: #f8f9fa;
        }
        /* Markdown styles */
        pre {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 1rem 0;
            overflow-x: auto;
        }
        code {
            background-color: #f8f9fa;
            padding: 2px 5px;
            border-radius: 3px;
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
        }
        pre code {
            background-color: transparent;
            padding: 0;
            border-radius: 0;
        }
        .markdown-content {
            max-width: 800px;
            margin: 0 auto;
        }
        .markdown-content h1 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid #eaecef;
            padding-bottom: 0.3rem;
        }
        .markdown-content h2 {
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid #eaecef;
            padding-bottom: 0.3rem;
        }
        .markdown-content h3 {
            margin-top: 1.25rem;
            margin-bottom: 1rem;
        }
        .markdown-content p {
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        .markdown-content ul, .markdown-content ol {
            margin-bottom: 1rem;
            padding-left: 2rem;
        }
        .markdown-content li {
            margin-bottom: 0.5rem;
        }
        .markdown-content img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 1rem 0;
        }
        .markdown-content blockquote {
            padding: 0.5rem 1rem;
            border-left: 4px solid #dfe2e5;
            color: #6a737d;
            margin: 1rem 0;
        }
        .markdown-content hr {
            height: 0.25rem;
            padding: 0;
            margin: 1.5rem 0;
            background-color: #e1e4e8;
            border: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar with navigation -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky pt-3">
                    <h5 class="px-3 mb-3">Documentation Files</h5>
                    <ul class="nav flex-column">
                        <?php foreach ($files as $file): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo $file === $currentFile ? 'active' : ''; ?>" 
                                   href="?file=<?php echo urlencode($file); ?>">
                                    <?php echo htmlspecialchars($file); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
                <div class="markdown-content">
                    <?php echo $html; ?>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize syntax highlighting
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('pre code').forEach((el) => {
                hljs.highlightElement(el);
            });
            
            // If there is an anchor in the URL, scroll to it
            if (window.location.hash) {
                setTimeout(function() {
                    const id = window.location.hash.substring(1);
                    const element = document.getElementById(id);
                    if (element) {
                        element.scrollIntoView();
                    }
                }, 100);
            }
        });
    </script>
</body>
</html> 