# PostgreSQL Questions

[← Back to README](README.md)

## Database Architecture and Concepts

### What is PostgreSQL?
PostgreSQL is an open-source object-relational database system that uses and extends the SQL language.

### What are the key features of PostgreSQL?
- ACID compliance
- Complex queries
- Foreign keys
- Triggers
- Views
- Multiversion concurrency control
- Streaming replication

## Indexing and Performance

### What is a non-clustered index?
A non-clustered index is a type of index where the order of the rows does not match the order of the actual data.

### What are the different types of indexes in PostgreSQL?
- B-tree
- Hash
- GiST
- SP-GiST
- GIN
- BRIN

### How do indexes affect performance?
Indexes improve query performance by providing quick access paths to data, but they add overhead for write operations.

## Data Types and Storage

### Can you store binary data in PostgreSQL?
Yes, using either bytes or the large object feature.

### What are the advantages of JSONB over JSON?
- Better performance for reading
- Indexing support
- No parsing needed
- Compression

### How does PostgreSQL handle arrays?
PostgreSQL allows columns of a table to be defined as variable-length multidimensional arrays.

## Functions and Procedures

### Explain functions in PostgreSQL
Functions in PostgreSQL are also known as stored procedures. They can be created in several languages such as SQL, PL/pgSQL, C, Python, etc.

### What are the different types of functions?
- Query functions
- Aggregate functions
- Window functions
- Trigger functions
- Table functions

### What is the difference between functions and procedures?
- Functions must return a value
- Procedures are designed to execute operations
- Functions can be used in SELECT statements
- Procedures are called using CALL statement

## Data Manipulation

### How can we change the column data type in SQL?
Using ALTER TABLE with ALTER COLUMN statement.

### What are the different types of constraints?
- NOT NULL
- UNIQUE
- PRIMARY KEY
- FOREIGN KEY
- CHECK
- EXCLUDE

### How do you handle NULL values?
Using IS NULL, IS NOT NULL, COALESCE, and NULLIF functions.

## Transaction Management

### What is MVCC (Multi-Version Concurrency Control)?
MVCC provides concurrent access to the database without unnecessary locking.

### What are the transaction isolation levels?
- Read Uncommitted
- Read Committed
- Repeatable Read
- Serializable

### How does PostgreSQL handle deadlocks?
PostgreSQL automatically detects deadlocks and resolves them by aborting one of the transactions.

## Backup and Recovery

### What are the backup methods?
- pg_dump
- pg_dumpall
- Continuous archiving
- Physical backups

### How do you implement replication?
- Streaming replication
- Logical replication
- Trigger-based replication
- Slony-I

### What is WAL (Write-Ahead Logging)?
WAL ensures data integrity by logging changes before they are written to the database.

## Performance Tuning

### How do you optimize queries?
- Use EXPLAIN ANALYZE
- Proper indexing
- Query rewriting
- Table partitioning
- Regular VACUUM

### What are the important configuration parameters?
- shared_buffers
- work_mem
- maintenance_work_mem
- effective_cache_size
- max_connections

### How do you handle large tables?
- Partitioning
- Table inheritance
- Regular cleanup
- Archiving old data

## Security

### What are the security features?
- Authentication methods
- Role-based access control
- SSL support
- Row-level security
- Column-level encryption

### How do you implement row-level security?
Using CREATE POLICY and ALTER TABLE ... ENABLE ROW LEVEL SECURITY.

### What are the authentication methods?
- Password
- LDAP
- GSSAPI
- Certificate
- PAM
- Radius

## Monitoring and Maintenance

### How do you monitor PostgreSQL?
- pg_stat_activity
- pg_stat_statements
- System catalogs
- Log analysis
- External monitoring tools

### What is VACUUM and why is it important?
VACUUM reclaims storage occupied by dead tuples and updates statistics.

### How do you handle table bloat?
- Regular VACUUM
- CLUSTER command
- Table rewriting
- Monitoring bloat levels

### What are the HA solutions?
- Streaming replication
- Patroni
- pgPool-II
- Stolon
- Repmgr

### How do you implement failover?
Using tools like:
- Patroni
- pgPool-II
- Repmgr
- Custom scripts

### What is connection pooling?
Connection pooling manages a pool of connections to reduce overhead of creating new connections.

## High Availability
- Replication setup
- Failover mechanisms
- Load balancing
- Monitoring
- Backup strategies

## Data Management

### Data Lake
A storage repository that holds a vast amount of raw data in its native format.

### Data Warehouse
A system for reporting and data analysis, considered a core component of business intelligence.

### Data Mesh
A decentralized socio-technical approach to share, access, and manage analytical data.

### Event Sourcing
Storing data as a sequence of events rather than just the current state.

### CQRS
Pattern that separates read and write operations for a data store.

### Polyglot Persistence
Using different data storage technologies for different data storage needs.

### Data Replication
The process of storing data in more than one site or node.

### Data Sharding
A type of database partitioning that separates large databases into smaller, faster, more easily managed parts.

## API Design

### REST
Representational State Transfer - architectural style for distributed hypermedia systems.

### GraphQL
A query language for APIs and a runtime for executing those queries.

### gRPC
A high-performance, open-source universal RPC framework.

### API Versioning
Strategies for managing changes to APIs without breaking existing clients.

### API Gateway
A server that acts as an API front-end, receiving API requests and routing them to appropriate backends.

### API Documentation
Tools and practices for documenting APIs effectively.

### API Security
Methods and practices for securing APIs against various threats.

### Rate Limiting
Controlling the rate of requests a client can make to an API.

## Error Handling

### Circuit Breaker
Pattern that prevents an application from repeatedly trying to execute an operation that's likely to fail.

### Retry Pattern
Pattern that enables an application to retry an operation in anticipation of it eventually succeeding.

### Fallback Pattern
Defining alternative actions when a service fails.

### Bulkhead Pattern
Isolating elements of an application into pools so that if one fails, the others will continue to function.

### Dead Letter Queue
A service implementation to store messages that meet one or more of the following criteria:
- Message that is sent to a queue that does not exist.
- Queue length limit exceeded.
- Message length limit exceeded.
- Message is rejected by another queue exchange.
- Message reaches a threshold read counter number, because it is not consumed.
- Message TTL is exceeded.

### Error Tracking
Tools and practices for monitoring and tracking application errors.

### Logging and Monitoring
Practices for effective application logging and monitoring.

### Graceful Degradation
The ability of a system to maintain limited functionality even when a large portion of it is inoperable. 