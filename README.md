# Form Save Bundle

This contao module saves forms configured with the save form field to the `tl_save_form` table.

## Requirements

- Contao 4.13+
- PHP 7.4 or 8.0+

## Install

```BASH
$ composer require guave/formsave-bundle
$ php vendor/bin/contao-console contao:migrate
```

## Usage

Create a form that saves to the table `tl_form_save` and has the following required field names:

- `alias`
- `first_name`/`firstname`
- `last_name`/`lastname`
- `e-mail`/`email`

Every other field with a field name will be serialized into a `form_data` field in the database.

In the form overview in Contao there will be a new button that allows you to download a CSV of the submissions.

## TODO

Currently, if you add, remove or change a field in the form after there are submissions, the csv will be inconsistent
and some values maybe under the wrong header. 
