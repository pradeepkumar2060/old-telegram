<?php
    return array(
        "paths" => array(
            "migrations" => "migrations"
        ),
        "environments" => array(
            "default_migration_table" => "phinxlog",
            "default_database" => "default",
            "default" => array(
                "adapter" => "mysql",
                "host" => getenv("DB_HOST"),
                "name" => getenv("DB_DATABASE"),
                "user" => getenv("DB_USERNAME"),
                "pass" => getenv("DB_PASSWORD")
            )
        )
    );