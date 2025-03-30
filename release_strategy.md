# Release Strategy

[← Back to README](README.md)

## Centralized (Trunk Based) approach

Trunk-based development is a version control management practice where developers merge small, frequent updates to a core "trunk" or main branch. Since it streamlines merging and integration phases, it helps achieve CI/CD and increases software delivery and organizational performance.

## GitFlow approach

Giflow is an alternative Git branching model that involves the use of feature branches and multiple primary branches. It was first published and made popular by Vincent Driessen at nvie. Compared to trunk-based development, Giflow has numerous, longer-lived branches and larger commits. Under this model, developers create a feature branch and delay merging it to the main trunk branch until the feature is complete. These long-lived feature branches require more collaboration to merge and have a higher risk of deviating from the trunk branch. They can also introduce conflicting updates.

Some key takeaways to know about Gitflow are:

- The workflow is great for a release-based software workflow.
- Gitflow offers a dedicated channel for hotfixes to production.
 
The overall flow of Gitflow is:

- A develop branch is created from main
- A release branch is created from develop
- Feature branches are created from develop
- When a feature is complete it is merged into the develop branch
- When the release branch is done it is merged into develop and main
- If an issue in main is detected a hotfix branch is created from main
- Once the hotfix is complete it is merged to both develop and main

## "Infrastructure as a Code" concept - Ansible / Ansible Tower

Infrastructure as code (IaC) is the process of managing and provisioning computer data centers through machine-readable definition files, rather than physical hardware configuration or interactive configuration tools. The IT infrastructure managed by this process comprises both physical equipment, such as bare-metal servers, as well as virtual machines, and associated configuration resources. The definitions may be in a version control system. The code in the definition files may use either scripts or declarative definitions, rather than maintaining the code through manual processes, but IaC more often employs declarative approaches.

## Dependency Management approaches

* Identify and visualize
* Engage with stakeholders
* Make a risk log
* Make contingency plans

1. `Logical dependencies`. Also known as causal dependencies. These dependencies are an inherent part of the project and cannot be avoided. Tasks characterized as logical dependency usually use the output of the preceding tasks as input so you can't run them in parallel. Consider baking a cake as your project. You can't start the process unless you have all the ingredients you need.

2. `Resource dependencies`. This dependency originates from a project constraint as it deals with the availability of shared resources. If two tasks require the same resource for completion, then they'll be dependent on the completion of the other.

3. `Preferential dependencies`. These dependencies generally depend on the team members,  other stakeholders, and industrial practices. Preferential dependencies arise when tasks are scheduled to follow developed standard practices. In most cases, the project can compete even if you ignore the preferential dependencies in your tasks, but there will be some quality issues.

4. `External dependencies`. No matter how much you plan, there are things bound to be out of your control. Some tasks are dependent on outside factors and project managers can't do anything to influence their project progress. To deal with these dependencies, it's recommended to have a backup plan. Delays from the suppliers or other unforeseen circumstances may take place which can affect your progress. A good project manager always makes some contingency plans so everything keeps running smoothly even in the face of adversity.

5. `Cross-team dependencies`. This is a common occurrence in large organizations. Sometimes multiple teams work on a single, complex project and they rely on each other to complete the project on time. Effective project time management can be implemented to avoid long hours.

## NuGet, Artifactory and Nexus

`nuget` NuGet is the package manager for .NET. The NuGet client tools provide the ability to produce and consume packages. The NuGet Gallery is the central package repository used by all package authors and consumers. https://www.nuget.org/ https://www.nuget.org/packages/python
 
`Artifactory`  https://www.jfrog.com/confluence/display/JFROG/PyPI+Repositories
Artifactory fully supports PyPI repositories providing:

- The ability to provision PyPI packages from Artifactory to the pip command line tool from all repository types.
- Calculation of Metadata for PyPI packages hosted in Artifactory's local repositories.
- Access to remote PyPI repositories (such as https://pypi.org/) through a Remote Repositories which provides proxy and caching functionality.
- The ability to access multiple PyPI repositories from a single URL by aggregating them under a Virtual Repositories.
- Compatibility with the setuptools and its predecessor distutils libraries for uploading PyPI packages.

`nexus`https://help.sonatype.com/repomanager3/nexus-repository-administration/formats/pypi-repositories

Both Nexus Repository Manager Pro and Nexus Repository Manager OSS support proxying the Python Package Index. This allows the repository manager to take advantage of the packages in the official Python Package Index without incurring repeated downloads. This will reduce time and bandwidth usage for accessing Python packages.

## Branching strategy

https://www.bmc.com/blogs/devops-branching-strategies

### Git Flow
Git Flow is the most widely known branching strategy that takes a multi-branch approach to manage the source code. This approach consists of two main branches that live throughout the development lifecycle.

Primary Branches
- `master`. The primary branch where all the production code is stored. Once the code in the "develop" branch is ready to be released, the changes are merged to the master branch and used in the deployment.
- `develop`. This is where all the actual development happens. All the pre-production code is stored here, and the completed code of all the supporting branches is merged directly to the develop branch.
- `feature-*` feature branches are used to develop new features and branches off exclusively from the develop branch.
- `hotfix-*` This is to deal with production issues where quick fixes are required. They can branch off from the master itself, but need to be merged to both master and develop branches.
- `release-*` This branch is used to aggregate fixes and improvements and prepare for the production release. It will be branched from the develop branch and merged to both develop and master.

### GitHub Flow
As the name suggests, this strategy was introduced by GitHub, aiming to provide a simple and lightweight approach to manage the development. It adheres to the following guidelines when managing the source control with a single primary branch.

- `master`. The primary branch where code is branched off from and merged to. Anything in the master branch is deployable.
- Any change (feature/bug) is made in a new branch derived from the master with a descriptive branch name describing the development.
- Commit to the development branch locally and regularly push to the branch.
- Create a pull request once the development is done so that the code can be reviewed.
- Once the code is reviewed and approved, it must be tested in the branch before merging to the master branch.
- From this point, users can immediately deploy the master branch with the new changes.

### Trunk Based Development (TBD)
The Trunk Based Development strategy involves developers integrating their changes directly into a shared trunk (master) at least once a day. This shared trunk is always in a releasable state. Developers can pull from this trunk, create a local repository, and then push the code to the shared trunk.

This regular integration enables developers to view each other's changes quickly and immediately react if there are any conflicts.

### GitLab Flow
The GitLab strategy combines feature-driven development and feature branches with issue tracking. This strategy is similar to GitHub flow yet includes environmental branches such as `development`, `pre-production`, and `production`.

In GitLab Flow, development happens in one of these environmental branches, and verified and tested code is merged to other branches until they reach the production branch. Let's assume that we have the three environmental branches mentioned above. In that case, the development workflow will be:

## Continuous Integration	
* Follows CI rules (use project's CI tools, immediately fix broken build, etc.)	
* Writes/Updates build configuration script
* Implements and improves CI processes on the project

## Continuous Delivery & Deployment		
* Has experience with Delivery Pipeline usage 