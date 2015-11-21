@domain
Feature: Manage a website

  Scenario: Create a website
    Given I want to create a website with a name, a description and an author
    Then I must have a website with id 1234

  Scenario: Active a website
    Given I have a website
    Then I want to activate my website
    And my website can be read by a visitor

  Scenario: Disable a website
    Given I have a website
    Then I want to disable my website
    And my website can't be read by a visitor

