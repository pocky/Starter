@domain
Feature: Manage a website

  Scenario: Create a website
    Given I don't have any website
    When I create my website with a name, an headline, a description and an author in fr_FR
    Then I must have a website with id 1234

  Scenario: Active a website
    Given I have a website
    When I enable my website
    Then my website can be read by a visitor

  Scenario: Disable a website
    Given I have a website
    When I disable my website
    Then my website can't be read by a visitor

  Scenario: Update an existing website
    Given I have a website
    When I update his name with name2


