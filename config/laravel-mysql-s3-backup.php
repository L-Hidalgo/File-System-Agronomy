<?php

use Illuminate\Support\Str;

return [
    /*
     * Configure with your Amazon S3 credentials
     * You should use an IAM user who only has PutObject access
     * to a specified bucket
     */
    'local' => [
        'driver' => 'local',
        'root' => public_path('app/public'),
        'url' => env('APP_URL').'/storage',
        'visibility' => 'public',
    ],

    /*
     * Want to add some custom mysqldump args?
     */
    'custom_mysqldump_args' => null,

    /*
     * Whether to gzip the .sql file
     */
    'gzip' => true,

    /*
     * Time allowed to run backup
     */
    'sql_timout' => 7200, // 2 hours

    /*
     * Backup filename
     */
    'filename' => Str::slug(env('APP_NAME')).'backup-%s.sql',

    /*
     * Where to store the backup file locally
     */
    'backup_dir' => '/tmp',

    /*
     * Do you want to keep a copy of it or delete it
     * after it's been uploaded?
     */
    'keep_local_copy' => false,

    /*
     * Do you want to keep a rolling number of
     * backups on S3? How many days worth?
     */
    'rolling_backup_days' => 14,
];