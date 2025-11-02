# AI-Powered Secure User Data Collection Portal

[![Project Demo](https://img.youtube.com/vi/jLo4hehCzAg/maxresdefault.jpg)](https://youtu.be/jLo4hehCzAg)

Welcome to the Secure Portal project! Watch this demo to see it in action.

**AI-Powered Secure User Data Collection Portal with Blockchain Integration**
_Project Overview_
This project is a secure web application built using the Laravel PHP framework designed to collect user data safely and efficiently. It leverages advanced AES-256 encryption to protect sensitive information, applies AI-powered validation to ensure data accuracy, and records transactions immutably on a blockchain ledger for enhanced data integrity and transparency.

The portal provides a modern user interface with smooth animations and security badges, creating a professional and trustworthy data collection experience.
====================================================================================================================================================================
**Key Features**
_Robust Security:_ Employs AES-256 encryption to secure user-submitted data.

_AI Validation:_ Uses AI algorithms to verify data correctness and consistency automatically.

_Blockchain Integration:_ Records each transaction on the blockchain for immutability.

_User-Friendly UI:_ Responsive and clean interface with interactive animations for trust.

_File Uploads:_ Allows users to securely upload supporting documents.

_Dashboard:_ Displays submission statuses with AI confidence scores and validation details.
====================================================================================================================================================================
**Tools & Technologies Used**
Laravel PHP Framework: For building the backend, routing, controllers, Blade templating, and MVC architecture.

PHP 8.x: Server-side scripting language powering Laravel and business logic.

Blade Templates: Laravel's templating engine for creating dynamic views.

JavaScript & CSS: For client-side interactions and animations.

Tailwind CSS: Utility-first CSS framework used for styling and design consistency.

Git & GitHub: Version control with Git and remote repository hosting on GitHub.

OBS Studio: Screen recording software used to create project demo videos.

MySQL (or equivalent): Database support via Laravel’s Eloquent ORM.

Blockchain API/Service (optional): For recording transaction hashes securely.
====================================================================================================================================================================
**Development Process**
Planning & Design: Designed the project structure focusing on secure data handling and user validation.

Backend Development: Created migrations, models, controllers, and services in Laravel for data processing and AI validation integration.

Frontend UI: Developed Blade views using Tailwind CSS for responsive and aesthetic interfaces with animations.

Security Implementation: Integrated AES-256 encryption for data storage and CSRF protection for forms.

Testing: Performed extensive testing on data submission, file uploads, AI validation results, and blockchain recording behavior.

Version Control: Managed code via Git and pushed to GitHub repository regularly.

Documentation: Created this README and demo videos to showcase key features and usage.
====================================================================================================================================================================
**Setup Instructions**
Clone the repository:

bash
git clone https://github.com/XmanRana/secure-data-collection-blockchain.git
Install composer dependencies:

bash
composer install
Copy .env.example to .env and configure your database and API keys.

Generate app key:

bash
php artisan key:generate
Run migrations:

bash
php artisan migrate
Start the development server:

bash
php artisan serve
Open your browser at http://localhost:8000 to access the portal.
====================================================================================================================================================================
**How to Use**
Navigate to the secure form to submit your data.

Upload any supporting documents if required.

Submit the form and wait for AI validation results.

Check the dashboard for your submission status and details.
