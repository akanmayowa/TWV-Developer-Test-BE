# Alpha Vet International Developer Test

Welcome to the Alpha Vet International developer test.

## Requirements

Please note, this site has been built using PHP 7.4. If you are using a different version of PHP, you should re-run composer install.

This has also been built using Node version 16.0.0 and NPM version 7.10.0. If you are using a different version, you may run into some issues with installing NPM packages. If you do run into these issues, check your Node and NPM versions, and drop me an email – neil.benson@thewebinarvet.com.

## Setup Instructions

- We recommend that you use a local environment tool, like Laravel Valet, WAMP, MAMP, or XAMPP.
- You will need Composer installed. Install it if you don't already have it installed.
- Using Git, clone down a copy of the repo to the relevant folder directory.
- Set up your local environment tool to point to the folder.
- Copy the `.env` file contents (at the bottom of this file) into a file called `.env`
- Create a new database and add the name of the database to the env file.
- Using your command prompt on Windows, or the terminal on Mac, run the following:

```bash
php composer install

php artisan migrate
php artisan db:seed

npm install
npm run watch
```

If you navigate to the site, you should see a login screen. Use the following details:

Username: admin@example.com  
Password: password

## Test

### User Story  
**When** a computer gets within one year of its maximum lifespan, **the application should** alert users that the computer will need replacing,

 **so that** the cost can be accounted for when budget plans for the following year are being drawn up by the IT team.

**When** a new computer has been bought, **the application should** allow a user to create a computer to be added to the system.

**When** a computer is no longer in our possession, **the application should** allow a user to remove a computer from the system.

### Conditions/Requirements

* Any computer with an OS of Windows **must** have an alert displayed on its page when more than 4 years have passed since purchase.
* Any computer with an OS of MacOS **must** have an alert displayed on its page when more than 6 years have passed since purchase.
* Any computer younger than these dates **must** not be have any alert displayed.
* All backend functionality you've coded **must** have tests

### Process

* Please use version control and make regular commits as you would normally.
* When finished, please create a private repo on Github (or another provider if you do not have a Github account) and invite neil.benson@thewebinarvet.com and        joe.wright@thewebinarvet.com to it.
* Push the repo up.

### Next steps

Once you have completed the test, pushed the code to the repo, and emailed to let us know you're done, we'll arrange a follow up interview. In that interview, you will be asked to present and explain your approach.

## Resources

### Design

The design file is available <a href="https://www.figma.com/file/MUN1B7cO7SDCbbbjxxdrzX/Alpha-Vet-Developer-Test?node-id=0%3A1&t=ufQG3tMrzfpVX6zC-0" target="_blank">here</a>

Please create an account if you don't already have one.

### Figma

If you've never used Figma before, then please read the following. Selecting elements will provide information about properities and values, as well as spacing.

![Figma Example](/figmahelp.png)

In the example, we have selected the heading Attention Needed. On the right hand panel, you'll see under typography everything that is needed.

You don't need to worry about the font family as this is set at the top level.

However, you do need to add the font weight, size, and line height. These will be done using Tailwind CSS classes (more information is available below). It also tells you the color.

For example, this would have the following markup:

```
<h2 class="text-sm font-bold text-yellow-800">Attention needed</h2>
```

yellow/800 == text-yellow-800
weight: 700 == font-bold
size: text-sm

### Laravel 8

This project is built using the latest version of Laravel (Laravel 8). It also makes use of Laravel Breeze, but that is outside of the scope of this task and shouldn't be necessary to look into further.

[Laravel 8 Docs](https://laravel.com/docs/8.x)

### Tailwind CSS

We use Tailwind CSS for CSS styling. This may be different to how you've written CSS in the past. It uses atomic, or utility-first class naming, instead of more traditional semantic naming. There are plenty of videos out there that can give you a more detailed deep dive, but the basic difference is that instead of having one or two classes per element that do lots of things, you have multiple classes that all do one thing.

Think of a button. You can tell from the class button, that it's a button, but that's all. As you probably know, almost every website's buttons look and behave differently. The only way to tell how a button is built is to look in the CSS file. However, it isn't always a straight forward as that.

You may find that there's a different button style for a button within a div that has a class of `.hero`. This class could be definied in a completely different part of the CSS file, or even potentially a different file, or folder. This makes it far harder than it needs to be to understand how a site is built, nevermind the risk of introducing unexpected behaviour, which in turn, introduces bugs.

While it might appear to be more confusing at first, it's actually a lot easier to work with. Looking at a button, you know that an element with a class of `.px-2` will have padding left and right of 8px (Tailwind uses a 4px/0.25rem scale, so 2 x 4px = 8px). You don't have to worry that it may have been overwritten because of where it is in the site and the cascade. Instead, everything is flat and at the same level.

Now you might think 'but having to add 10+ classes to every element must be hard to manage', and you'd be right. This is where Laravel Blade (and other templating engines like Vue, React, Twig etc) come in. Instead of using CSS to do the heavy lifting of reusing styles, we instead use components.

On the whole, follow the principle of convention over configuration when it comes to Tailwind, meaning that almost all of this site's CSS set up is the same as default Tailwind. The only place where it differs is in text sizes. Instead of using abstract class names like `.text-2xl`, use leverage the in-built scale to allow you to define the text size you want to use. For example, `.text-10` will give your content a font size of 40px (10 x 4px). This approach makes it far easier to understand what size font you are working with.

The only place this doesn't happen is within smaller font sizes (between 12px and 18px). Instead, these use two character codes instead of numbers.

```
font-size: 12px = text-xs
font-size: 14px = text-sm
font-size: 16px = text-base
font-size: 18px = text-lg
```

> Note: You will not need to edit the Tailwind config at all. All the classes you need are already available, and have been pre-configured.

[Tailwind CSS docs](https://tailwindcss.com/)

## ENV file content

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:1zNYQeYiL0oWDGH67lbSOvLV3lSAs3qHnvVA0xd+hog=
APP_DEBUG=true
APP_URL=http://dev.test

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dev
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

## Heroicon Code

This is the exclamation 

```
<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
</svg>
```
