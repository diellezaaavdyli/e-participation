<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        Role::create([
            'id' => 1,
            'type' => User::TYPE_ADMIN,
            'name' => 'Administrator',
        ]);

        // Non Grouped Permissions
        //

        // Grouped permissions
        // Users category

        $users = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.user',
            'description' => 'All User Permissions',
        ]);

        $issues = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.issue',
            'description' => 'All Issues Permissions',
        ]);

        $comments = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.comment',
            'description' => 'All Comments Permissions',
        ]);

        $tags = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.tag',
            'description' => 'All Tags Permissions',
        ]);

        $activities = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.activity',
            'description' => 'All Activities Permissions',
        ]);

        $forms = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.form',
            'description' => 'All Forms Permissions',
        ]);
        $settings = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.setting',
            'description' => 'All Settings Permissions',
        ]);
        $mails = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.mails',
            'description' => 'All Mails Permissions',
        ]);
        $users->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.list',
                'description' => 'View Users',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.deactivate',
                'description' => 'Deactivate Users',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.reactivate',
                'description' => 'Reactivate Users',
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.clear-session',
                'description' => 'Clear User Sessions',
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.impersonate',
                'description' => 'Impersonate Users',
                'sort' => 5,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.change-password',
                'description' => 'Change User Passwords',
                'sort' => 6,
            ]),

        ]);

   

        $issues->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.issue.view',
                'description' => 'View Issues',
                'sort' => 1,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.issue.view-deleted',
                'description' => 'View Deleted Issues',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.issue.status',
                'description' => 'Change Issue Status',
                'sort' => 3,
            ]),
    
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.issue.delete',
                'description' => 'Delete Issue',
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.issue.restore',
                'description' => 'Restore Issue',
                'sort' => 5,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.issue.delete-permanently',
                'description' => 'Delete Issue Permanently',
                'sort' => 6,
            ]),

        ]);

        $comments->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.comment.view',
                'description' => 'View Comments',
                'sort' => 1,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.comment.status',
                'description' => 'Change Comment Status',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.comment.delete',
                'description' => 'Delete Comment',
                'sort' => 3,
            ]),
        ]);

        $tags->children()->saveMany([
            
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.tag.view',
                'description' => 'View Tags',
                'sort' => 1,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.tag.view-deleted',
                'description' => 'View Deleted Tags',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.tag.add',
                'description' => 'Add Tag',
                'sort' => 3,
            ]),
  
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.tag.edit',
                'description' => 'Edit Tag',
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.tag.delete',
                'description' => 'Delete Tag',
                'sort' => 5,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.tag.restore',
                'description' => 'Restore Tag',
                'sort' => 6,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.tag.delete-permanently',
                'description' => 'Delete Tag Permanently',
                'sort' => 7,
            ]),
        ]);

        $activities->children()->saveMany([

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.activity.view',
                'description' => 'View Activities',
                'sort' => 1,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.activity.view-deleted',
                'description' => 'View Deleted Activities',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.activity.add',
                'description' => 'Add Activity',
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.activity.edit',
                'description' => 'Edit Activity',
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.activity.delete',
                'description' => 'Delete Activity',
                'sort' => 5,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.activity.restore',
                'description' => 'Restore Activity',
                'sort' => 6,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.activity.delete-permanently',
                'description' => 'Delete Activity Permanently',
                'sort' => 7,
            ]),
        ]);

        $forms->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.form.view',
                'description' => 'View Forms',
                'sort' => 1,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.form.status',
                'description' => 'Form Status',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.form.delete',
                'description' => 'Delete Form',
                'sort' => 3,
            ])
        ]);

        $settings->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.setting.view',
                'description' => 'View Settings',
                'sort' => 1,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.setting.edit',
                'description' => 'Edit Settings',
                'sort' => 2,
            ]),
        ]);
        $mails->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.mails.view',
                'description' => 'View Mails',
                'sort' => 1,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.mails.edit',
                'description' => 'Edit Mails',
                'sort' => 2,
            ]),
        ]);
        $this->enableForeignKeys();
    }
}
