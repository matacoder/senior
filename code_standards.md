# Code Standards

[← Back to README](README.md)

## Code Review Process

What to know:

* Code Review Best Practices (aims, feedback, reporting, periodicity, reviewers hierarchy)
* Performs code review for "Merge/Pull requests" in GitLab
* Performs code review with Atlassian Crucible
* Gerrit  (online code review) https://gerrit-documentation.storage.googleapis.com/Documentation/3.5.1/intro-how-gerrit-works.html

Gerrit is a Git server that provides access control for the hosted Git repositories and a web front-end for doing code review. Code review is a core functionality of Gerrit, but still it is optional and teams can decide to work without code review.

## Pre- and Post-commit Code Reviews

In this regard, there are two types of code review: pre-commit and post-commit. Pre- and post-commit review concepts are quite self-explanatory: pre-commit is a type of review when the code is reviewed before it goes to the main repository of the version control system. Post-commit review takes place after the code has been submitted to the public repository.

Have a look at some of the advantages and disadvantages of these two review types before deciding which one to adopt.

### Pros of pre-commit:
- Company's coding quality standards are met before the work is committed to the main repository
- This scenario helps to make sure the review has been performed, not postponed or omitted
- Pre-commit reviews ensure other developers in your team won't be affected by bugs that may be found during a review

### Cons of pre-commit:
- Decreases productivity of each developer, since further work on the submitted code is impossible until a successful review, and takes even longer if multiple reviewers are involved
- After successfully passing a review, the developer could commit a different piece of code, by mistake or otherwise

### Pros of post-commit:
- A developer can work and commit changes to the repository continuously
- Other team members see the code changes and can alter their work accordingly
- Some changes can be complex and require multiple steps, so it's convenient to examine each step separately after all of them have been committed

### Cons of post-commit:
- Increased chances of poor code making it into the main repository, hence affecting the entire team's work
- When defects are found, it may take a while for the developer to switch back to the module they had been working on

## Code Quality Metrics

### Qualitative Code Quality Metrics
Qualitative metrics are subjective measurements that aim to better define what good means.

#### Extensibility
Extensibility is the degree to which software is coded to incorporate future growth. The central theme of extensible applications is that developers should be able to add new features to code or change existing functionality without it affecting the entire system.

#### Maintainability
Code maintainability is a qualitative measurement of how easy it is to make changes, and the risks associated with such changes.

#### Readability and Code Formatting
Readable code should use indentation and be formatted according to standards particular to the language it's written in; this makes the application structure consistent and visible.

#### Clarity
Clarity is an indicator of quality that says good code should be unambiguous. If you look at a piece of code and wonder what on earth it does, then that code is ambiguous.

#### Documentation
If the program is not documented, it will be difficult for other developers to use it, or even for the same developer to understand the code years from now.

#### Testing
Well tested programs are likely to be of higher quality, because much more attention is paid to the inner workings of the code and its impact on users.

#### Efficiency
Efficient code only uses the computing resources it needs to. Another efficiency measurement is that it runs in as little time as possible.

### Quantitative Code Quality Metrics

#### Weighted Micro Function Points
This metric is a modern software sizing algorithm that parses source code and breaks it down into micro functions. The algorithm then produces several complexity metrics from these micro functions, before interpolating the results into a single score.

#### Halstead Complexity Measures
The Halstead complexity measures include program vocabulary, program length, volume, difficulty, effort, and the estimated number of bugs in a module.

#### Cyclomatic Complexity
Cyclomatic complexity is a metric that measures the structural complexity of a program by counting the number of linearly independent paths through a program's source code. 