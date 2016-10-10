[![Build Status](https://travis-ci.org/rayhan/RayMailer.svg?branch=master)](https://travis-ci.org/rayhan/RayMailer)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)

# RayMailer plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require rayhan/ray-mailer
```

## Configuration

Add following line to your app bootstrap.php file.

```
Plugin::load('RayMailer', ['routes' => true]);
```

## Database

Add database schema from the config/Schema/raymailer.sql file.

## Usage

#### Create Layouts and Templates
  Access templates at
	   http://path_to_your_cake_installation/ray-mailer/templates

  Create database layout and templates as necessary.

#### Load mailer class
```
use RayMailer\Mailer\RayMailer;
```

#### Send email
```
$mailer = new RayMailer();
$result = $mailer->deliver('welcome-email', ['to' => 'example@example.com', 'param1' => 'Value of param1'], ['debug' => false]);
```
