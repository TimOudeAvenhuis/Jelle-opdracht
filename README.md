# Jelle-opdracht

# First waht you gone do is clone your project from github: git clone https://github.com//[yourprofile]//[name-of-project].git

# Then create a Laravel project with: composer crerate-project laravel/laravel [name-of-project]

# Then you Link the database to yout storage: php artisan storage:link

# Then you mak a generated key: php artisan key:generate

# Now you Ready to go

# php artisan migrate:fresh -> make the database emty and reful te database
# php artisan migrate -> make te database ful the things you edded to the migrations

# If you add relations to you database migrations in then you make a new table: add_relations_to_[name_of_table]_table
# How to make a relation with a other table? use in the Model: HasOne / HasMany / HasOneThrough / HasManyThrough
# you have to youse for the other table: BelogsTo