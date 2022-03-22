# Python Questions for Senior and Lead roles

## Ways to execute Python code: exec, eval, ast, code, codeop, etc.

The `exec(object, globals, locals)` method executes the dynamically created program, which is either a string or a code object. Returns `None`. Only side effect matters!

Example 1:
```python
program = 'a = 5\nb=10\nprint("Sum =", a+b)'
exec(program)
```
```bash
Sum = 15
```

Example 2:
```python
globals_parameter = {'__builtins__' : None}
locals_parameter = {'print': print, 'dir': dir}
exec('print(dir())', globals_parameter, locals_parameter)
```
```bash
['dir', 'print']
```

The `eval(expression, globals=None, locals=None)` method parses the expression passed to this method and runs python expression (code) within the program. Returns the value of expression!

```python
>>> a = 5
>>> eval('37 + a')   # it is an expression
42
>>> exec('37 + a')   # it is an expression statement; value is ignored (None is returned)
>>> exec('a = 47')   # modify a global variable as a side effect
>>> a
47
>>> eval('a = 47')  # you cannot evaluate a statement
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
  File "<string>", line 1
    a = 47
      ^
SyntaxError: invalid syntax
```

If a `code` object (which contains Python bytecode) is passed to `exec` or `eval`, they behave identically, excepting for the fact that exec ignores the return value, still returning `None` always. So it is possible use `eval` to execute something that has statements, if you just compiled it into bytecode before instead of passing it as a string:
```python
>>> eval(compile('if 1: print("Hello")', '<string>', 'exec'))
Hello
>>>
```

`Abstract Syntax Trees`, ASTs, are a powerful feature of Python. You can write programs that inspect and modify Python code, after the syntax has been parsed, but before it gets compiled to byte code. That opens up a world of possibilities for introspection, testing, and mischief.

In addition to compiling source code to bytecode, `compile` supports compiling abstract syntax trees (parse trees of Python code) into `code` objects; and source code into abstract syntax trees (the `ast.parse` is written in Python and just calls `compile(source, filename, mode, PyCF_ONLY_AST))`; these are used for example for modifying source code on the fly, and also for dynamic code creation, as it is often easier to handle the code as a tree of nodes instead of lines of text in complex cases.

The `code` module provides facilities to implement read-eval-print loops in Python. Two classes and convenience functions are included which can be used to build applications which provide an **interactive interpreter prompt**.

The `codeop` module provides utilities upon which the Python read-eval-print loop can be emulated, as is done in the `code` module. As a result, you probably don’t want to use the module directly; if you want to include such a loop in your program you probably want to use the code module instead.

## Advanced differences  between 2.x and 3.x in general

### Division operator
If we are porting our code or executing python 3.x code in python 2.x, it can be dangerous if integer division changes go unnoticed (since it doesn’t raise any error). It is preferred to use the floating value (like 7.0/5 or 7/5.0) to get the expected result when porting our code. 
### `print` function
This is the most well-known change. In this, the print keyword in Python 2.x is replaced by the print() function in Python 3.x. However, parentheses work in Python 2 if space is added after the print keyword because the interpreter evaluates it as an expression. 
### Unicode
In Python 2, an implicit str type is ASCII. But in Python 3.x implicit str type is Unicode. 

### `xrange`
xrange() of Python 2.x doesn’t exist in Python 3.x. In Python 2.x, range returns a list i.e. range(3) returns [0, 1, 2] while xrange returns a xrange object i. e., xrange(3) returns iterator object which works similar to Java iterator and generates number when needed. 

### Error Handling
There is a small change in error handling in both versions. In python 3.x, ‘as’ keyword is required. 

### `_future_` module
The idea of the __future__ module is to help migrate to Python 3.x. 
If we are planning to have Python 3.x support in our 2.x code, we can use _future_ imports in our code. 

### Six
Six is a Python 2 and 3 compatibility library. It provides utility functions for smoothing over the differences between the Python versions with the goal of writing Python code that is compatible on both Python versions. See the documentation for more information on what is provided.

## `deepcopy`, method `copy`, slicing, etc.
In the above code, the copy() returns a shallow copy of list and deepcopy() return a deep copy of list.
Python `slice()` function returns a slice object. 

A sequence of objects of any type(`string`, `bytes`, `tuple`, `list` or `range`) or the object which implements `__getitem__()` and `__len__()` method then this object can be sliced using `slice()` method.

## OrderedDict, DefaultDict
An OrderedDict is a dictionary subclass that remembers the order that keys were first inserted. The only difference between dict() and OrderedDict() is that:

`OrderedDict` preserves the order in which the keys are inserted. A regular dict doesn’t track the insertion order and iterating it gives the values in an arbitrary order. By contrast, the order the items are inserted is remembered by OrderedDict.

`Defaultdict` is a container like dictionaries present in the module collections. `Defaultdict` is a sub-class of the dictionary class that returns a dictionary-like object. The functionality of both dictionaries and defaultdict are almost same except for the fact that defaultdict never raises a KeyError. It provides a default value for the key that does not exists.

```python
from collections import defaultdict

def def_value():
    return "Not Present"

d = defaultdict(def_value)
```

## `hashable()`

An object is hashable if it has a hash value that does not change during its entire lifetime. Python has a built-in hash method ( `__hash__()` ) that can be compared to other objects. For comparing it needs `__eq__()` or `__cmp__()` method and if the hashable objects are equal then they have the same hash value. All immutable built-in objects in Python are hashable like tuples while the mutable containers like lists and dictionaries are not hashable. 

`lambda` and user functions are hashable.

Objects hashed using `hash()` are irreversible, leading to loss of information.
`hash()` returns hashed value only for immutable objects, hence can be used as an indicator to check for mutable/immutable objects.

## Strong and weak typing

Python is strongly, dynamically typed.

* **Strong** typing means that the type of value doesn't change in unexpected ways. A string containing only digits doesn't magically become a number, as may happen in Perl. Every change of type requires an explicit conversion.
* **Dynamic** typing means that runtime objects (values) have a type, as opposed to static typing where variables have a type.

```python
bob = 1
bob = "bob"
```

This works because the variable does not have a type; it can name any object. After `bob = 1`, you'll find that `type(bob)` returns `int`, but after `bob = "bob"`, it returns `str`.

##Frozenset
The `frozenset()` function returns an immutable frozenset object initialized with elements from the given iterable.

Frozen set is just an immutable version of a Python `set` object. While elements of a set can be modified at any time, elements of the frozen set remain the same after creation.

Due to this, frozen sets can be used as keys in Dictionary or as elements of another set. But like sets, it is not ordered (the elements can be set at any index).

## Weak references
Python contains the ``weakref`` module that creates a weak reference to an object. If there are no strong references to an object, the garbage collector is free to use the memory for other purposes.

Weak references are used to implement caches and mappings that contain massive data.

## Raw strings

Python raw string is created by prefixing a string literal with ‘r’ or ‘R’. Python raw string treats backslash (\) as a literal character. This is useful when we want to have a string that contains backslash and don’t want it to be treated as an escape character.


## Unicode and ASCII strings	

Unicode is international standard where a mapping of individual characters and a unique number is maintained. As of May 2019, the most recent version of Unicode is 12.1 which contains over 137k characters including different scripts including English, Hindi, Chinese and Japanese, as well as emojis. These 137k characters are each represented by a unicode code point. So unicode code points refer to actual characters that are displayed.
These code points are encoded to bytes and decoded from bytes back to code points. Examples: Unicode code point for alphabet a is U+0061, emoji 🖐 is U+1F590, and for Ω is U+03A9.

The main takeaways in Python are:
1. Python 2 uses str type to store bytes and unicode type to store unicode code points. All strings by default are `str` type — which is bytes~ And Default encoding is ASCII. So if an incoming file is Cyrillic characters, Python 2 might fail because ASCII will not be able to handle those Cyrillic Characters. In this case, we need to remember to use decode("utf-8") during reading of files. This is inconvenient.
2. Python 3 came and fixed this. Strings are still `str` type by default but they now mean unicode code points instead — we carry what we see. If we want to store these `str` type strings in files we use bytes type instead. Default encoding is UTF-8 instead of ASCII. Perfect!

# Python Statements and Syntax

## Iteration protocol.

Technically, in Python, an iterator is an object which implements the iterator protocol, which consist of the methods `__iter__()` and `__next__()`.

## Generators
Generators are iterators, a kind of iterable you can only iterate over once. Generators do not store all the values in memory, they generate the values on the fly

## yield
`yield` is a keyword that is used like `return`, except the function will return a generator.
To master `yield`, you must understand that when you call the function, the code you have written in the function body does not run. The function only returns the generator object, this is a bit tricky.

## method send(), throw(), next(), close()

`send()` - sends value to generator, send(None) must be invoked at generator init.

```python
def double_number(number):
    while True:
        number *= 2
        number = yield number
```

`throw()` - throw custom exception. Useful for databases:

```python
def add_to_database(connection_string):
    db = mydatabaselibrary.connect(connection_string)
    cursor = db.cursor()
    try:
        while True:
            try:
                row = yield
                cursor.execute('INSERT INTO mytable VALUES(?, ?, ?)', row)
            except CommitException:
                cursor.execute('COMMIT')
            except AbortException:
                cursor.execute('ABORT')
    finally:
        cursor.execute('ABORT')
        db.close()
```

## Coroutines
Coroutines declared with the `async`/`await` syntax is the preferred way of writing asyncio applications. For example, the following snippet of code (requires Python 3.7+) prints “hello”, waits 1 second, and then prints “world”:
```python
>>> import asyncio

>>> async def main():
...     print('hello')
...     await asyncio.sleep(1)
...     print('world')

>>> asyncio.run(main())
hello
world
```

# Functions in Python	

## When and how many times are default arguments evaluated?

Once when program is launched

## `partial`

`functools.partial(func, /, *args, **keywords)`

Return a new partial object which when called will behave like func called with the positional arguments args and keyword arguments keywords. If more arguments are supplied to the call, they are appended to args. If additional keyword arguments are supplied, they extend and override keywords.

## Best practice decorators for functions

The basic idea is to use a function, but return a partial object of itself if it is called with parameters before being used as a decorator:

```python
from functools import wraps, partial

def decorator(func=None, parameter1=None, parameter2=None):

   if not func:
        # The only drawback is that for functions there is no thing
        # like "self" - we have to rely on the decorator 
        # function name on the module namespace
        return partial(decorator, parameter1=parameter1, parameter2=parameter2)
   @wraps(func)
   def wrapper(*args, **kwargs):
        # Decorator code-  parameter1, etc... can be used 
        # freely here
        return func(*args, **kwargs)
   return wrapper
```
And that is it - decorators written using this pattern can decorate a function right away without being "called" first:
```python
@decorator
def my_func():
    pass
```
Or customized with parameters:

```python
@decorator(parameter1="example.com", ...):
def my_func():
    pass
```

## Decorator

```python
import functools

def require_authorization(f):
    @functools.wraps(f)
    def decorated(user, *args, **kwargs):
        if not is_authorized(user):
            raise UserIsNotAuthorized
        return f(user, *args, **kwargs)
    return decorated

@require_authorization
def check_email(user, etc):
    # etc.
```

## Decorator factory (passing args to decorators)

```python
def require_authorization(action):
    def decorate(f):
        @functools.wraps(f):
        def decorated(user, *args, **kwargs):
            if not is_allowed_to(user, action):
                raise UserIsNotAuthorized(action, user)
            return f(user, *args, **kwargs)
        return decorated
    return decorate
```

## `wraps`

Preserves original name of the function

## Decorator for class
1. Just use inheritance
2. Use decorator, that returns class
```python
def addID(original_class):
    orig_init = original_class.__init__
    # Make copy of original __init__, so we can call it without recursion

    def __init__(self, id, *args, **kws):
        self.__id = id
        self.getId = getId
        orig_init(self, *args, **kws) # Call the original __init__

    original_class.__init__ = __init__ # Set the class' __init__ to the new one
    return original_class

@addID
class Foo:
    pass
```
3. Use metaclass

Indeed, metaclasses are especially useful to do black magic, and therefore complicated stuff. But by themselves, they are simple:

* intercept a class creation
* modify the class
* return the modified class

```python
>>> class Foo(object):
...       bar = True

>>> Foo = type('Foo', (), {'bar':True})

class UpperAttrMetaclass(type):
    def __new__(cls, clsname, bases, attrs):
        uppercase_attrs = {
            attr if attr.startswith("__") else attr.upper(): v
            for attr, v in attrs.items()
        }
        return type(clsname, bases, uppercase_attrs)
```

The main use case for a metaclass is creating an API. A typical example of this is the Django ORM.

## Indirect function calls
1) use another variable for this function
2) use `partial`
3) use as parameter `def indirect(func, *args)`
4) use nested func and return it (functional approach)
5) `eval("func_name()")` -> returns func result
6) `exec("func_name()")` -> returns None
7) importing module (assuming module foo with method bar):
```python
module = __import__('foo')
func = getattr(module, 'bar')
func()
```
8) `locals()["myfunction"]()`
9) `globals()["myfunction"]()`
10) dict()
```python
functions = {'myfoo': foo.bar}

mystring = 'myfoo'
if mystring in functions:
    functions[mystring]()
```

## Function introspection

Introspection is an ability to determine the type of an object at runtime. Everything in python is an object. Every object in Python may have attributes and methods. By using introspection, we can dynamically examine python objects. Code Introspection is used for examining the classes, methods, objects, modules, keywords and get information about them so that we can utilize it. Introspection reveals useful information about your program’s objects. 

- `type()`: This function returns the type of an object.
- `dir()`: This function return list of methods and attributes associated with that object.
- `id()`: This function returns a special id of an object.
- `help()`	It is used it to find what other functions do
- `hasattr()`	Checks if an object has an attribute
- `getattr()`	Returns the contents of an attribute if there are some.
- `repr()`	Return string representation of object
- `callable()`	Checks if an object is a callable object (a function)or not.
- `issubclass()`	Checks if a specific class is a derived class of another class.
- `isinstance()`	Checks if an objects is an instance of a specific class.
- `sys()`	Give access to system specific variables and functions
- `__doc__`	Return some documentation about an object
- `__name__`	Return the name of the object.

## Implementation details of functional programming, for vs map
Functional programming is a programming paradigm in which the primary method of computation is evaluation of pure functions. Although Python is not primarily a functional language, it’s good to be familiar with `lambda`, `map()`, `filter()`, and `reduce()` because they can help you write concise, high-level, parallelizable code. You’ll also see them in code that others have written.

```python
list(
     map(
         (lambda a, b, c: a + b + c),
         [1, 2, 3],
         [10, 20, 30],
         [100, 200, 300]
     )
)
list(filter(lambda s: s.isupper(), ["cat", "Cat", "CAT", "dog", "Dog", "DOG", "emu", "Emu", "EMU"]))
reduce(lambda x, y: x + y, [1, 2, 3, 4, 5], 100)  # (100 + 1 + 2 + 3 + 4 + 5), 100 is initial value
```


##Function attributes
```python
def func():
    pass
dir(func)
    Out[3]: 
    ['__annotations__',
     '__call__',
    ...
     '__str__',
     '__subclasshook__']
func.a = 1
dir(func)
    Out[5]: 
    ['__annotations__',
     '__call__',
    ...
     '__str__',
     '__subclasshook__',
     'a']
print(func.__dict__)
{'a': 1}
func.__getattribute__("a")
    Out[7]: 1
```

# Scopes in Python	
## LEGB rule

Python resolves names using the so-called LEGB rule, which is named after the Python scope for names. The letters in LEGB stand for Local, Enclosing, Global, and Built-in. Here’s a quick overview of what these terms mean:

1. Local (or function) scope is the code block or body of any Python function or lambda expression. This Python scope contains the names that you define inside the function. These names will only be visible from the code of the function. It’s created at function call, not at function definition, so you’ll have as many different local scopes as function calls. This is true even if you call the same function multiple times, or recursively. Each call will result in a new local scope being created.

2. Enclosing (or nonlocal) scope is a special scope that only exists for nested functions. If the local scope is an inner or nested function, then the enclosing scope is the scope of the outer or enclosing function. This scope contains the names that you define in the enclosing function. The names in the enclosing scope are visible from the code of the inner and enclosing functions.

3. Global (or module) scope is the top-most scope in a Python program, script, or module. This Python scope contains all of the names that you define at the top level of a program or a module. Names in this Python scope are visible from everywhere in your code. `dir()`

4. Built-in scope is a special Python scope that’s created or loaded whenever you run a script or open an interactive session. This scope contains names such as keywords, functions, exceptions, and other attributes that are built into Python. Names in this Python scope are also available from everywhere in your code. It’s automatically loaded by Python when you run a program or script. `dir(__builtins__)`: 152 names

The LEGB rule is a kind of name lookup procedure, which determines the order in which Python looks up names. For example, if you reference a given name, then Python will look that name up sequentially in the local, enclosing, global, and built-in scope. If the name exists, then you’ll get the first occurrence of it. Otherwise, you’ll get an error.

When you call `dir()` with no arguments, you get the list of names available in your main global Python scope. Note that if you assign a new name (like var here) at the top level of the module (which is `__main__` here), then that name will be added to the list returned by `dir()`.

## `global` and `nonlocal`

### The `global` Statement

The statement consists of the global keyword followed by one or more names separated by commas. You can also use multiple global statements with a name (or a list of names). All the names that you list in a global statement will be mapped to the global or module scope in which you define them.

### The `nonlocal` Statement
Similarly to global names, nonlocal names can be accessed from inner functions, but not assigned or updated. If you want to modify them, then you need to use a nonlocal statement. With a nonlocal statement, you can define a list of names that are going to be treated as nonlocal.

The nonlocal statement consists of the nonlocal keyword followed by one or more names separated by commas. These names will refer to the same names in the enclosing Python scope. 

## Scopes and nested functions, closures

This technique by which some data (hello in this case) gets attached to the code is called closure in Python.

```python
def print_msg(msg):
    # This is the outer enclosing function
    def printer():
        # This is the nested function
        print(msg)
    return printer  # returns the nested function

# Now let's try calling this function.
another = print_msg("Hello")
another()
# Output: Hello
```

The criteria that must be met to create closure in Python are summarized in the following points.

- We must have a nested function (function inside a function).
- The nested function must refer to a value defined in the enclosing function.
- The enclosing function must return the nested function.

Python Decorators make an extensive use of closures as well.

## globals() и locals(): Meaning, could we change both of them?	

- `globals()` always returns the dictionary of the module namespace
- `locals()` always returns a dictionary of the current namespace
- `vars()` returns either a dictionary of the current namespace (if called with no argument) or the dictionary of the argument.

It does not automatically update when variables are assigned, and assigning entries in the dict will not assign the corresponding local variables.

# Modules in Python		

## Module `reload`, `importlib`

Reload a previously imported module. The argument must be a module object, so it must have been successfully imported before. This is useful if you have edited the module source file using an external editor and want to try out the new version without leaving the Python interpreter. The return value is the module object (which can be different if re-importing causes a different object to be placed in sys.modules).

```python
from importlib import reload  # Python 3.4+
import foo

while True:
    # Do some things.
    if is_changed(foo):
        foo = reload(foo)
```

# OOP in Python	
* abstract base class
* getattr(), setattr()
* __getattr__, __setattr__, __delattr__
* __getattribute__
* Name mangling
* @property(getter, setter, deleter)
* init,  repr, str, cmp,  new , del,  hash, nonzero, unicode, class operators
* Rich comparison methods
* __call__
* Multiple inheritance
* Classic algorithm
* Diamond problem
* MRO, super
* Mixins
* metaclass definition
* type(), isinstance(), issubclass()
* __slots__	
Troubleshooting in Python	* Types of profilers: Static and dynamic profilers
* resources module	
Exceptions in Python	* context managers contextlib decorator, with-enabled class
* traces	
Unit testing in Python	* Mock objects
* Coverage
* nosetests, doctests	
Memory management in Python	* 3 generations of GC
* which type of objects are tracked?
* module gc
* recommendations for GC usage	* Memory leaks/deleters issues
Threading and multiprocessing in Python	* GIL (Definition, algorithms in 2.x and 3.x)
* Threads(modules thread, threading; class Queue; locks)
* Processes(multiprocessing, Process, Queue, Pipe, Value, Array, Pool, Manager)	* How to avoid GIL restrictions (C extensions)
Distributing and documentation in Python	* distutils, setup.py	* code publishing
* Documentation autogeneration: sphinx, pydoc, etc.
Python and C interaction	* C ext API,call C from python, call python from C	* cffi, swig, SIP, boost-python
Python tools		
Python standard library	* Advanced knowledge of stndard library: math, random, re, sys, os, time,datetime, argparse, optparse, etc.	
Code Standards		* Knows how to design and implement Code Standards
Code Review Process	* Uses Code Review Best Practices (aims, feedback, reporting, periodicity, reviewers hierarchy)
* Performs code review for "Merge/Pull requests" in GitLab
* Performs code review with Atlassian Crucible
* Knows Gerrit basics
* Explains Pros and Cons of Pre- and Post-commit Code Reviews
* Implements and improves Code Review process on the project	
Release Strategy	* Understands purpose of branching
* Explains Centralized (Trunk Based) approach
* Explains GitFlow approach
* Understands "Infrastructure as a Code" concept
* Understands Dependency Management problems
* Describes possible approaches for dependency management
* Knows advantages of build repository tools like NuGet, Artifactory and Nexus
* Implements and improves Branching strategy on the project
* Drives proper environments setup (production like, numbers of environments, etc.)	
Continuous Integration	* Follows CI rules (use project's CI tools, immediately fix broken build, etc.)	* Writes/Updates build configuration script
* Implements and improves CI processes on the project
Continuous Delivery & Deployment		* Has experience with Delivery Pipeline usage
Unit and API Testing (White box)	* Explains purpose of test coverage. Understand how to treat this metric
Knows types of coverage (line, method, etc.)
* Uses both TDD and BDD approaches
Implements TDD and BDD from scratch	* Designs/Implements tests framework for legacy systems
* Understands the purpose of mutation testing, knows the tools
Logging		
Health Check	* Explains main approaches for monitoring	
Troubleshooting		
Leadership	* Has followers (recognized as leader at least by 2 people upon feedback from peers or by manager's observations)
* Focuses the group on common goal and takes responsibility for team/group result.
* Is able to organize teamwork effectively and engage employees in teamwork	
Planning and Organizing	* Prioritizing of activities and assignments, adjusts priorities when appropriate;
* Determines assignment requirements by breaking them down into concrete tasks
* Allocates appropriate amounts of time for completing own and others' work.	
Delegation	* Delegates task responsibility to appropriate subordinates (considering positive and negative impact of delegation);
* Defines and communicates basic parameters of delegated tasks (milestones and deadlines, type of control, expected results).	* Delegates based on a team member’s capabilities, experience, reliability and motivation.
* Clearly communicates all the parameters of the delegated responsibility, including definite goal, concrete success criteria, decision-making authority , constraints, etc., giving reasonable freedom in details
* Establishes appropriate procedures to be informed of issues and results in areas of shared responsibility.
* Knows what kind of work can be and shouldn't be delegated.
Control	* Controls assignments in his direct line supervision (ex. performed in his project by direct reporters) using simple type of control (ex. weekly report or daily meeting).
* Asks questions to obtain relevant information and gets feedback on results from those who are directly involved.	
Coordination		* Coordinates efforts and actions within one project between individuals in the project team, the project team and its internal and external partners.
* Helps employees in understanding how to be more effective in cooperation with others.
* Focuses on issues mainly in technical and team communication/interaction areas.
* Helps employees to identify next steps when it's unclear how to proceed




Софт-скиллы 
Пожалуйста, ознакомься с EPAM Values и code of ethical conduct https://info.epam.com/policy/russia/all-cities.html


1.	Как бы разрулил ситуацию: релиз завтра, в релиз должна попасть фича Х, над ней работает разработчик, но кто-то не хочет мержить это. 
2.	Пример, когда надо было делать фичу без четких требований: как 
3.	Пример: когда делал задачку, что пришлось бросить незавершенной 
•	Конфлюенс для доков и описания сложных вещей 
4.	Самый важный урок который я выучил за последний год 
5.	Let’s assume you have a team and you need to choose between Kanban and Scrum. It is greenfield development project with some devops tasks. How to choose one of them? 
6.	What was the worst problem which you have faced in Python domain? 
7.	What does senior mean according to you? 
8.	Что для тебя лично изменится, когда получишь бейджик сеньера 
9.	Пришел PO и говорит что есть срочная задача чтобы всунуть в середину спринта, задача не оценена и непонятно сколько займет
10.	Есть разраб который вдруг стал плохо перформить. и несколько задач задерживает. что делать? 
11.	Вдруг задача заблочилась на неопределенный срок и она в спринте и спринт в прогрессе 
12.	Agile: где не подходит 

Технические


1.	CAP c примерами
2.	Code quality metrics
3.	Multiprocessing vs Multithreading vs asyncio, что где применять
4.	Event loop – how it works. Виды многозадачности  
5.	SQL vs noSQL databases, где какие применяются
6.	Mmap
7.	Какие ООП шаблоны есть при работе с фреймворками
•	ORM - activerecord 
•	Django middleware – цепочка отвественности
8.	Тестирование рассказать про все, моки, раннер,  и т.п.
9.	Test coverage: branch coverage 
10.	Типы тестов: performance, penetration, functional, smoke, е2е. 
11.	Semantic versioning
12.	Уровни зрелости API
•	Level 1 tackles the question of handling complexity by using divide and conquer, breaking a large service endpoint down into multiple resources 
•	Level 2 introduces a standard set of verbs so that we handle similar situations in the same way, removing unnecessary variation 
•	Level 3 introduces discoverability, providing a way of making a protocol more self-documenting 
13.	Шаблоны по OOP, версионирование API 
14.	Blue-Green deployment
15.	What sort algorithms do you know? At least couple with their tradeoffs
16.	What algorithm is used in Python built-in sort function?
17.	If you created 5 forks of the same 10 mb memory process, how much memory would it require?
18.	How does dict work and explain the data structure?
19.	ideas on cutting memory consumption of python code
20.	How can you profile your application? What techniques do you know? What tools do you use for it?
21.	Difference between docker and VMs

  
Common
Do you know EPAM values? How do you understand these values?
Could you please tell us about a recent challenge you had on your project? What was the context? How did you resolve it? 
You need to select between different technologies. How would you select between them? 
How do you refactor legacy code? Imagine that you need to rewrite some legacy class. What will be your steps? 
Describe the approach you used for refactoring the legacy code. How did you trace the legacy implementation back to the requirements? How did you make sure the refactored code works properly? 
In your self-review, you mentioned your appreciation of extreme programming. Have you guys introduced it in your team, and how exactly?
WHat does it mean for you to be D3/D4?
What is technical debt and how to manage it? 
Imagine you are starting new project from scratch, how are you going to choose technologies for this project? 
You've played a lead role on a project - please tell us what would do differently next time you have similar opportunity
What does it mean for you to be D3/D4 specialist. Why do you think you are eligible for D3 position? 
How do you choose between two or more frameworks? What do you consider when evaluating them?
How you manage time as too many non-project activities plus production project?
If wrote a script for the task, but your colleague changes it name and move it somewhere without changing it's content, how you could find the script? 
What are the functional and non-functional requirements? 
 
Management
Your GROW form mentions that you made some optimization in your project. Can you please talk about this?
Are you satisfied with how the Code Reviev process is organized in your team? Suppose you have your opinion on how to improve the Code Review process in your team. How do you make your collegues know your suggestions? If you have only two minutes to present your thougths to your team, what would be a basic structure of your presentation?
Suppose you have a team of developers. How will you plan the activities for your team members? What will you take into account? 
Let's imagine that customer doesn't want to spend time on Retrospective. Could you try to describe why do you want to use retro on the project? How it can be useful for the customer?
Client wants to speed up the delivery of the project and asks to increase the team size 2 times. What challenges do you expect and how will you solve them? 
Lets image what you are the key developer in a project and you need to organize a meeting with a customer to discuss some important organization and technical questions. 
Please describe how you organize the meeting and what you will do after it?
Imagine that one of developers from your team has to leave project, because it's budget was reduced. How would you choose? 
 
 
Planning
Let's imagine situation. You have hew requirement. You need to write new Microservice that will have communication with previous. Tell me please, how you will cover this requirements with tests.  Previos context: how will you plan work for this requirement?  
You do not agree with the solution that is strongly suggested by the customer. What will your approach to such situation be? 
Imagine that you have very huge task and short deadline. What will be your actions? 
What will be your actions in case one of team members (or both of them) are out of timeline? 
 
 
Leadership
Let's say you are a teamlead and you realize that you are 3 weeks behind schedule and you won't be able to finish everything for the release. How would you handle this situation? 
Delegating
Please describe how to delegate tasks and evaluate the result
Control
How do you control a subordinate task progress? What to do in case you find out the task can't be completed on time? 
 
 
Soft Skills
Imagine if your teammate was responsible for developing a key feature and he failed. How would you handle this situation with the customer who will have to shift the release due to it?
Let's assume you're TL and have subordinate who constantly challenges your architectural decisions. What would be your actions?  
There is a team member who doesn't want to write documentation. How you would encorage the person to do (his/her) duty? 
Lets imagine that you have a conflict with one of your subordinates. What are your actions in this case?
 
Mentoring
You have been mentoring team members many times. Could you please describe how do you organize this process? Which material would be recommended by You for for a Junior for Senior and for a BA?
What are the main parts of the mentoring for you?  
 Please, tell me how to onboard new member to the team and adapt him for the project
You mentioned that you has an experience in mentoring. How did you organize the process? Which problems did you face? 
How would you organize a working process with a mentee. How would you estimate results for your mentee and for you personally? 
Your have been mentoring team members. Could you please describe how do you organize this process? What is your secret to be a successful mentor?  

Software developing process
Imagine that you have very huge task and short deadline. What will be your actions? 
could you replace a task description with a failing test?
How do you know it's time to refactor a functionality? How would get time to do it?
Imagine you disagree with a client about the potential solution for some problem. How do you approach such scenarios to balance aspects like relationship with a client, quality of the product or your own high standards. 
What if the client expects you to finish some work with hard deadlines, but you think requirements are not clear and you don't have much help from the client, will you commit to such assignments? 
 
 
Estimations
KPIs for developers. How to design developers metrics for management? KPI -> lines of the code produced by developer, testing setters and getters, number of resolved tickets?
Which estimation techniques do you know/use on your project? 
How to estimate tasks? what principles/methods whould you use to make estimations? In which cases what method is the most suitable? 
I noticed that you participated in estimations. How do you estimate your tasks?
During sprint planning sessions, do you face any difficulty in estimating the tasks whose requirements are not clear? How do you tackle such situations? 
You participated in story estimations. Please tell us which methods do you use/know to estimate tasks? 
If you don't have experience in some area, how do you estimate a task?
How can you improve accuracy of your estimations?
 
 
 
Software Developing Methodologies
I saw that you learnt about Agile processes. What are the main differences between Kanban and Scrum? How to utilize the technics on your current project? Do you have any improvement idea?
Could you please compare Scrum and Kanban. How would you select methodology for green field project?
Please compare Scrum and Kanban. Why would you choose one over the other? 
What is the purpose of the Sprint Retrospective ? Who can participate in it? 
How do you understand one of the Agile principles 'Simplicity - the art of minimizing the amount of work done -- is essential.' 
 
Scrum
What potential challenges and issues are waiting for a team willing to implement Scrum?  
Please describe SCRUM disadvantages
You are working with Scrum and the sprint has begun, PO comes with a new User Story and she wants to get it done in this sprint, what do you do? 
You've mentioned in the GROW form that you have a lab project with students. Why did you choose Scrum for it? Was it the right choice? 
why did you choose scrum for mentoring, not kanban ?
What are the core roles in SCRUM? Please describe a few of them briefly.
How to explain SCRUM to a Junior? Tell us some cases when the Scrum is not the best choice or it doesn't work at all - and mention what would You use in those cases? 
 
Code Review
 Could you please describe code review process on your project? Which principles/guidelines do you follow making it?
I saw in your grow that you practiced code review processes. What kind of improvements did you suggest compared to the current process? What would you do if one of your colleague refused your code review suggestion?  
Are you satisfied with how the Code Reviev process is organized in your team? Suppose you have your opinion on how to improve the Code Review process in your team. How do you make your collegues know your suggestions? If you have only two minutes to present your thougths to your team, what would be a basic structure of your presentation?
What different methods of organizing code review do you know? What are advantages and disadvantages of each way? 
How would you handle a disagreemnt during a code review? 
A junior dev in your team complains about code reviews. He/she feels them as a burden which slows progress down. How do you handle this situation? 
