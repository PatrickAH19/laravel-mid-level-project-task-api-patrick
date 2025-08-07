### Proyect Apirestful con Laravel
## Migrate y Models
- Primero creo los modelos que necesitaremos: Projetc y Task.
- Junto con estos, se crea unas migraciones que utilizaremos para crear las tablas.
`php artisan make:model Proyect -m`
`php artisan make:model Task -m`

## Migrate
- Preparo todos los campos que necesito con las validaciones.
- uso foreignId en Task para crear una relacion de uno a muchos con Projects.
# Projects
`
Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('status', ['pending', 'active', 'completed']);
            $table->timestamps();
        });
`

# Tasks
`
Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['pending', 'active', 'completed']);
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
`

## Relacion 1:*
Project.php -> hasMany(Task::class)
Task.php -> belongsTo(Project::class)