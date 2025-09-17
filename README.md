# KOBİYİM

```
.
├── app
│   ├── Auth
│   │   ├── Http
│   │   │   ├── Controllers
│   │   │   │   ├── AuthenticatedSessionController.php
│   │   │   │   ├── NewPasswordController.php
│   │   │   │   ├── PasswordResetLinkController.php
│   │   │   │   └── RegisteredUserController.php
│   │   │   ├── Requests
│   │   │   │   ├── LoginRequest.php
│   │   │   │   └── RegisterRequest.php
│   │   │   └── Responses
│   │   │       └── LockoutResponse.php
│   │   ├── Rules
│   │   │   └── Password.php
│   │   └── Services
│   │       ├── AttemptToAuthenticate.php
│   │       ├── CreatesNewUsers.php
│   │       ├── EnsureLoginIsNotThrottled.php
│   │       ├── LoginRateLimiter.php
│   │       ├── PasswordValidationRules.php
│   │       └── PrepareAuthenticatedSession.php
│   ├── Http
│   │   └── Controllers
│   │       └── Kobiyim
│   │            ├── ActivityController.php
│   │            ├── Controller.php
│   │            ├── KobiyimModalsController.php
│   │            ├── PermissionController.php
│   │            ├── SystemController.php
│   │            └── UserController.php
│   ├── Console
│   │   └── Commands
│   │       ├── KobiyimBackup.php
│   │       └── KobiyimUser.php
│   ├── Metronic
│   │   ├── Init.php
│   │   ├── Menu.php
│   │   └── Metronic.php
│   ├── Models
│   │   ├── ActivityLog.php
│   │   ├── Permission.php
│   │   ├── QueryLog.php
│   │   ├── User.php
│   │   └── UserPermission.php
├── routes
│   └── auth.php
├── helpers.php
└── resources
    └── views/kobiyim/*
    └── views/logo/*
```

## Güncelleme Notlar

### v1.0.0 (21.01.2024)

- İlk versiyon