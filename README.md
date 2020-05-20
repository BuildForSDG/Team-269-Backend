# Team-269-Backend

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/27dcc4acfa9c4d8f95f058acd398a058)](https://app.codacy.com/gh/BuildForSDG/Team-269-Backend?utm_source=github.com&utm_medium=referral&utm_content=BuildForSDG/Team-269-Backend&utm_campaign=Badge_Grade_Settings)

API for data collection app to measure proportion of urban population living in slums, informal settlements or inadequate housing

## About

A data collection app to measure proportion of urban population living in slums, informal settlements or inadequate housing.

## Why

Data gaps across the African continent threaten to hinder the achievement of the Sustainable Development Goals and the African Union’s Agenda 2063. According to the United Nations, 68% of the SDG indicators lack data. This makes it difficult to measure progress on achievement of SDGs.The absence of high quality data on various indicators makes it difficult for policy makers and other stakeholders to plan and make informed decisions.

The number of people living in urban areas is rapidly increasing globally. However, cities and urban areas are not coping with the influx of people and the rate of urbanization. It is estimated that 1 billion people live in slums globally.
Many countries do not have adequate data on the proportion of the population that live in slums who need adequate housing, which is a basic human right.

Our solution will therefore help to address SDG 17 and SDG 11, indicator 11.1.1: Proportion of urban population living in slums
{
"email": "example@256.com",
"password": "password"
}

## Usage

How would someone use what you have built, include URLs to the deployed app, service e.t.c when you have it setup

## Setup

To setup this project on your computer, follow these steps:

1. clone the repo onto your computer
2. change directory to the project directory i.e `cd [project-folder]`
3. create a `.env` file and copy and paste all the contents of the `.env.example` file into the new file. Change the following details
    1. `db_name` - the name of the database
    2. `db_user` - the database user
    3. `db_password` - the password of the database user
4. run the following commands
    1. `composer install` - to install all the dependencies.
    2. `php artisan key:generate` - to generate the application key (used for encryption).
    3. `php artisan jwt:secret` - to generate the secret key that will be used for creating auth tokens.
    4. `php artisan migrate` - to run the database migrations.
5. to start the app, simply run `php artisan serve` from within the root of the project i.e
    1. `cd [project-folder]`
    2. `php artisan serve`

## Available endpoints

| **Type** | **Endpoint**                |
| -------- | --------------------------- |
| POST     | `api/v1/auth/login`         |
| POST     | `api/v1/auth/logout`        |
| POST     | `api/v1/auth/refreshToken`  |
| POST     | `api/v1/auth/register`      |
| PUT      | `api/v1/auth/resetPassword` |
| GET      | `api/v1/auth/user`          |
| GET      | `api/v1/user`               |
| GET      | `api/v1/users`              |
| POST     | `api/v1/users`              |
| GET      | `api/v1/users/{user}`       |
| PUT      | `api/v1/users/{user}`       |
| DELETE   | `api/v1/users/{user}`       |

## Test data

```json
{
	"email": "example@256.com",
	"password": "password"
}
```

## Some useful commands (For Devs)

-   `php artisan test` - to run all the tests
-   `composer lint` - to run the linter
-   `composer lint:fix` - to fix the lint errors

## Authors

-   Mentor: Lewis Tanguhwa
-   TTL: Bright Onapito
-   Product Manager: Henry Mutegeki

#### Backend Engineers

- [Eugene Owak](https://github.com/geneowak)
- [Victor Otim](https://github.com/victor-otim)
- [Philbert Obuchel](https://github.com/philbertobuchel)
- [Bright Onapito](https://github.com/onabright)
- [Julius Ssemakula](https://github.com/microsoftjulius)

## Contributing

If this project sounds interesting to you and you'd like to contribute, thank you!
First, you can send a mail to buildforsdg@andela.com to indicate your interest, why you'd like to support and what forms of support you can bring to the table, but here are areas we think we'd need the most help in this project :

1.  area one (e.g this app is about human trafficking and you need feedback on your roadmap and feature list from the private sector / NGOs)
2.  area two (e.g you want people to opt-in and try using your staging app at staging.project-name.com and report any bugs via a form)
3.  area three (e.g here is the zoom link to our end-of sprint webinar, join and provide feedback as a stakeholder if you can)

## Acknowledgements

### Source code

Add credits

### Articles and reports

-   [Devex](https://www.devex.com/news/data-gaps-threaten-achievement-of-development-goals-in-africa-95825)
-   [Open Data Watch Report: Mapping Gender Data Availability in Africa](https://opendatawatch.com/monitoring-reporting/bridging-gender-data-gaps-in-africa/)
-   [TRENDS Report: Counting on the World to Act](https://countingontheworld.sdsntrends.org/)

## LICENSE

MIT
