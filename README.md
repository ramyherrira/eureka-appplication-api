# Deezer for Creators - Backend Technical Test
This test has as an objective to assess your knowledge in backend programming and how you work.
This should remain a fun practice and the occasion to showcase your passion and capabilities, have fun ! :)

## Subject

You have to build the new Deezer for Creators REST API!

We will focus on the first endpoint which aims to provide demographics for a particular artist over 3 days.
This endpoint should provide the total number of streams over the period and the gender repartition for those streams (percentages over male and female).
It should also allow to select the startDate and the endDate on which we can select data.

You agreed with the frontend engineer with whom you are working on this project on the following outputs for the endpoint:
```
{
    data: {
        totalStreams: 123456
        femalePercent: 65
        malePercent: 35
    }
}
```
_These are mocked data, you should have different results_

We consider you are in a logged environment. You have a csv linked to this test to extract data and store it into a Database (MySQL, sqlite…).

## Technical constraints

* Use **php >= 8.1**
* Write unit tests with **PHPUnit** (functional tests in **behat** are nice to have)
* **Don't use PHP frameworks**
* Share MySql schema in the sql directory
* No ORM unless you are the one who wrote it !
