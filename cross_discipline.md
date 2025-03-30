# Cross-discipline Questions

[← Back to README](README.md)

## Design patterns Cheetsheet

### Behavioral (green) Cheetsheet

<img src="images/designpatterns1.jpeg">

### Structural (orange) and Creational (blue) Cheetsheet

<img src="images/designpatterns2.jpeg">

## Creational Design Patterns

### Factory Method - Common interface
Provides an interface for creating objects in a superclass, but allows subclasses to alter the type of objects that will be created. 

### Abstract Factory - Furniture -> Antique, Modern ...
Lets you produce families of related objects without specifying their concrete classes.

### Builder - Pizza making actions
Lets you construct complex objects step by step. The pattern allows you to produce different types and representations of an object using the same construction code.

### Prototype - Copy and Deepcopy
Lets you copy existing objects without making your code dependent on their classes.

### Singleton - DB connection
Lets you ensure that a class has only one instance, while providing a global access point to this instance.

## Structural Design Patterns

### Adapter - XML -> JSON
Allows objects with incompatible interfaces to collaborate.

### Bridge - Different shapes can have different colors
Lets you split a large class or a set of closely related classes into two separate hierarchies—abstraction and implementation—which can be developed independently of each other.

### Composite - Tree Structure (Folder/Element)
Lets you compose objects into tree structures and then work with these structures as if they were individual objects.

### Decorator - Additional features for object
Lets you attach new behaviors to objects by placing these objects inside special wrapper objects that contain the behaviors.

### Facade - Simple interface for video converter
Provides a simplified interface to a library, a framework, or any other complex set of classes.

### Flyweight - Bullet in games = Particle + Current Position
Lets you fit more objects into the available amount of RAM by sharing common parts of state between multiple objects instead of keeping all of the data in each object.

### Proxy - Do not invoke heavy object while you can
Lets you provide a substitute or placeholder for another object. A proxy controls access to the original object, allowing you to perform something either before or after the request gets through to the original object.

## Behavioral Design Patterns

### Chain of Responsibility - Support Levels
Lets you pass requests along a chain of handlers. Upon receiving a request, each handler decides either to process the request or to pass it to the next handler in the chain.

### Command - Save command in various place of interface
Turns a request into a stand-alone object that contains all information about the request. This transformation lets you pass requests as a method arguments, delay or queue a request's execution, and support undoable operations.

### Iterator (iter, next)
Lets you traverse elements of a collection without exposing its underlying representation (list, stack, tree, etc.).

### Mediator - Airport dispatcher
Lets you reduce chaotic dependencies between objects. The pattern restricts direct communications between the objects and forces them to collaborate only via a mediator object.

### Memento - Undo operation (Ctrl+Z)
Lets you save and restore the previous state of an object without revealing the details of its implementation.

### Observer - Publisher + Subscriber
Lets you define a subscription mechanism to notify multiple objects about any events that happen to the object they're observing.

### State - Draft -> Published
Lets an object alter its behavior when its internal state changes. It appears as if the object changed its class.

### Strategy - Navigator -> Drive or Walk
Lets you define a family of algorithms, put each of them into a separate class, and make their objects interchangeable.

### Template Method
Defines the skeleton of an algorithm in the superclass but lets subclasses override specific steps of the algorithm without changing its structure.

### Visitor (Looks like Mixin)
Lets you separate algorithms from the objects on which they operate.

## CAP Theorem

### Availability
Availability means that every request from the user should elicit a response from the system. Whether the user wants to read or write, the user should get a response even if the operation was unsuccessful.

### Consistency
Consistency means that the user should be able to see the same data no matter which node they connect to on the system. This data is the most recent data written to the system.

### Partition tolerance
Partition refers to a communication break between nodes within a distributed system. Partition tolerance means that the system should still be able to work even if there is a partition in the system.

## Modern Software Architecture Patterns
- Event-Driven Architecture (EDA)
- CQRS (Command Query Responsibility Segregation)
- Event Sourcing
- Microservices Architecture
- Serverless Architecture
- Hexagonal Architecture (Ports and Adapters)
- Clean Architecture
- Domain-Driven Design (DDD)

## Cloud-Native Patterns
- 12-Factor App methodology
- Container Orchestration
- Service Mesh
- API Gateway
- Circuit Breaker
- Bulkhead Pattern
- Sidecar Pattern
- Ambassador Pattern
- Adapter Pattern
- Back Pressure Pattern

## Security Patterns
- OAuth 2.0 and OpenID Connect
- JWT (JSON Web Tokens)
- API Security
- Zero Trust Architecture
- Defense in Depth
- Least Privilege Principle
- Security by Design
- DevSecOps practices

## Performance Patterns
- Caching Strategies
- Load Balancing
- Database Sharding
- Read Replicas
- Write-Ahead Logging
- Connection Pooling
- Rate Limiting
- Circuit Breaking
- Bulkhead Isolation

## Testing Patterns
- Test-Driven Development (TDD)
- Behavior-Driven Development (BDD)
- Continuous Testing
- Shift-Left Testing
- Test Pyramid
- Feature Flags
- A/B Testing
- Chaos Engineering

## DevOps Patterns
- Infrastructure as Code (IaC)
- GitOps
- Continuous Integration/Deployment
- Blue-Green Deployment
- Canary Releases
- Feature Flags
- Configuration Management
- Monitoring and Observability

## Data Management Patterns
- Data Lake
- Data Warehouse
- Data Mesh
- Event Sourcing
- CQRS
- Polyglot Persistence
- Data Replication
- Data Sharding

## API Design Patterns
- REST
- GraphQL
- gRPC
- API Versioning
- API Gateway
- API Documentation
- API Security
- Rate Limiting

## Error Handling Patterns
- Circuit Breaker
- Retry Pattern
- Fallback Pattern
- Bulkhead Pattern
- Dead Letter Queue
- Error Tracking
- Logging and Monitoring
- Graceful Degradation

## Scalability Patterns
- Horizontal Scaling
- Vertical Scaling
- Load Balancing
- Database Sharding
- Caching
- Message Queues
- Microservices
- Serverless Computing

## Monitoring and Observability Patterns
- Distributed Tracing
- Metrics Collection
- Log Aggregation
- Alerting
- Dashboarding
- APM (Application Performance Monitoring)
- Synthetic Monitoring
- Real User Monitoring (RUM) 