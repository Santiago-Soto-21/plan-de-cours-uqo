<?php

namespace App\Enum;

enum PermissionsEnum: string
{
    // Permissions for Director and Secretary
    case ApprovePlans = 'approve_plans';
    case RejectPlans = 'reject_plan';
    case CommentReason = 'comment_reason';

    // Permissions for Prof
    case GenerateTemplate = 'generate_template';
    case SubmitPlan = 'submit_plan';

    // Extra permission for admin
    case ManageUsers = 'manage_users';
}
