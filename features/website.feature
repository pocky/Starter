@domain
Feature: Manage a website

  Scenario: Create a website
    Given I want to create a website with a name, a description and an author
    Then I must have a website with id 1234
