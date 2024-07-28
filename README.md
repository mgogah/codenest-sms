# CodeNest SMS Application

## Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/mgogah/codenest-sms.git
   cd codenest-sms

2. Install dependencies:
composer install

3. Set up environment variables:
cp .env.example .env
php artisan key:generate

4. Configure database and SMS providers in the .env file.

5. Generate Application Key:
php artisan key:generate

6. Run migrations:
php artisan migrate

7. Serve the application:
php artisan serve


## Usage
1. Open the Application in Your Browser

2. Navigate to http://localhost:8000 in your web browser.

3. Send SMS Messages:

   - Use the form to input the phone number, message, and select the provider (Twilio or Nexmo). Click the "Send SMS" button.

4. Check the Status: 
   The status of the sent messages can be checked in the messages table in your database.

## Project Structure
   - Controllers
      - SMSController: Handles SMS sending requests.
   - Jobs
      - SendSMS: Handles the SMS sending logic and updates the message status in the database.
   - Models
      - Message: Represents the messages sent via the application.
   - Services
      - Providers
         - TwilioProvider: Integration with Twilio.
         - NexmoProvider: Integration with Nexmo.
      - SMSFactory: Factory pattern to switch between different SMS providers.
   - Views
      - send.blade.php: The frontend form to send SMS messages.
   - Routes
      - web.php: Defines the route for sending SMS messages.
   - Config
      - sms.php: Stores SMS providers' credentials and settings.

