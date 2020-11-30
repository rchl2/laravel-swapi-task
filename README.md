# RESTAPIDocs Examples

Dev and Deliver recruitment task. Pulling data from SWAPI. 

## Open Endpoints

Open endpoints require no Authentication.

* Login: `POST /api/login/`
* Register: `POST /api/register/`

## Endpoints that require Authentication

Closed endpoints require a valid Token to be included in the header of the
request. A Token can be acquired from the login route listed above.

### Authorized User related

Each endpoint manipulates or displays information related to the User whose
Token is provided with the request:

* Authorized user informations: `GET /api/`
* Authorized user update e-mail action: `POST /api/user/update-email`

### Authorized user SWAPI resources related

Endpoints for viewing data from SWAPI that the Authenticated User
has permissions to access.

##### Films resource
* Single: `GET /api/films/{id}`
* List: `GET /api/films`

##### Species resource
* Single: `GET /api/species/{id}`
* List: `GET /api/species`

##### Vehicles resource
* Single: `GET /api/vehicles/{id}`
* List: `GET /api/vehicles`

##### Starships resource
* Single: `GET /api/starships/{id}`
* List: `GET /api/starships`

##### Planets resource
* Single: `GET /api/planets/{id}`
* List: `GET /api/planets`

### Artisan commands included

* Users in storage list: `php artisan users:list`
