
use Modules\Registrations\Models\Application;
use Modules\Registrations\Models\RegistrationApproval;
use Modules\Registrations\Models\RegistrationApprovalStage;

use Modules\Registrations\Services\ApprovalService;
 

php artisan module:make-model  RegistrationApproval Registrations -m
php artisan module:make-model  RegistrationApprovalStage Registrations -m
