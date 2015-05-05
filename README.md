# cashy
Simple money management tool with a server side service for database actions and a web client and an android client.

!!Note that this project is in its first steps and will most likely not work at the current stage.!!

## Server
The Server currently is a simple php service, that takes parameters over URL and takes actions against the configured database accordingly.
This sever side implementation will eventually be replaced by a Java application.
- PHP Implementation
- MySQL Database
- Outputs JSON


## Client
There will be two clients: one HTML/PHP Client for web-usage and one Android Client (see cashy-android-client repository) for mobile usage.

### Web Client
- HTML / PHP 
- Bootstrap

# Todos
## Location detection
- Use GPS to locate places in the database 
- Use GPS / Beacon technology to check in at home 
- If user was at a shopping location send reminder
- At random times, when user was at a different location, then comes home, ask if he went shopping and wants to document it

## Manage lists
- CRU(D)
- Categorize
- Estimate price
- Set an estimated price
- Mark as done (set spent price)

## Intelligence
If user decides to provide very detailed information on every shopping session, it would be possible to generate average prices based on earlier entered products bought. Prices for saved lists could be generated then.
