# senior
Python Questions for Senior and Lead roles

Вопросы к ассессменту D3/D4

Disclaimer: Многие вопросы встречаются на оба грейда. От D4 ожидается более глубокая техэкспертиза и больше опыта в разных процессах. Стоит прорабатывать все вопросы, даже если вы идете на D3.


Матрица скиллов

Skill	L3	L4
Python General Information	* Ways to execute Python code: exec, eval, ast, code, codeop, etc.
* Advanced differences  between 2.x and 3.x in general
* six	
Python Types and Operations	* deepcopy, method copy, slicing, etc.
* ordereddict, defaultdict
* hashable
* Strong and weak typing
* Frozenset
* Weak references
* Raw strings
* Unicode and ASCII strings	
Python Statements and Syntax	* yield
* comprehensions vs generators
* gen expressions
* range vs xrange
* Manual iteration: iter() and next()
* Iteration protocol.
* Iterable, Range iterable	* method send(), throw(), next(), close()
* coroutines
Functions in Python	* When and how many times are default arguments evaluated?
* partial
* decorators for functions, decorators for classes
* wraps
* passing args to decorators	* Indirect function calls
* Function introspection
* Implementation details of functional programming, for vs map
* Function attributes
Scopes in Python	* LEGB rule

* global and nonlocal

* Scopes and nested functions, closures

* globals() и locals():Meaning, could we change both of them?	
Modules in Python		* module reload, importlib
OOP in Python	* abstract base class
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
