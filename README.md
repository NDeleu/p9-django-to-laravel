Projet en construction.
Certaines modifications sont encore à réaliser.

Actuellement : 

Problème sur la gestion login, change password form et done et register (signup) (+ problème sur redondance de nom /home natif de Laravel et home de la logique métier)


Piste de solution possible (changement à venir) :

Gestion des routes : Vous pouvez conserver vos routes actuelles pour l'inscription (signup) et la modification de la photo de profil (upload_profile_photo), car ces fonctionnalités sont spécifiques à votre application. Cependant, vous devrez ajuster la gestion de la page de connexion.

Supprimez la route personnalisée que vous avez créée pour la page de connexion (showLoginForm) dans votre fichier web.php.

Ajoutez les routes d'authentification natives de Laravel en utilisant la méthode Auth::routes(). Cela générera automatiquement les routes pour la connexion, l'inscription, la réinitialisation du mot de passe, etc.

Assurez-vous que la route vers la page d'accueil est correctement configurée, comme vous l'avez déjà fait, pour rediriger vers home en cas de succès.

```
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Routes pour l'authentification
Auth::routes();

// Route vers la page d'accueil
Route::get('/home', [HomeController::class, 'index'])->name('home');

```

Personnalisation des vues d'authentification : Vous pouvez continuer à personnaliser vos vues d'authentification dans le répertoire resources/views. Assurez-vous que ces vues correspondent à vos besoins, en particulier login.blade.php, password_change_done.blade.php, password_change_form.blade.php, signup.blade.php, et upload_profile_photo.blade.php.

Redirection vers la page de connexion : Vous avez mentionné que si un utilisateur non authentifié accède à home, il est automatiquement redirigé vers la page de connexion. Vous pouvez laisser cette logique en place, car elle est utile pour sécuriser les pages nécessitant une authentification.

Autres considérations : Assurez-vous que votre gestion de la connexion et de l'inscription personnalisée dans le contrôleur AuthenticationController reste inchangée, car elle semble déjà correspondre à vos besoins.

En suivant ces étapes, vous pouvez tirer parti de l'authentification native de Laravel pour la connexion et l'inscription tout en conservant vos propres vues personnalisées pour ces fonctionnalités. Les utilisateurs seront redirigés vers les pages d'authentification natives de Laravel lorsqu'ils accéderont aux routes associées, mais vous pouvez personnaliser ces pages selon vos besoins. Cela simplifiera la gestion de l'authentification dans votre application.
