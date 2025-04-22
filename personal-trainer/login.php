<?php
// Initialize variables
$email = '';
$errors = [];
$success = false;

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate email
    if (empty($_POST['email'])) {
        $errors['email'] = 'El email es obligatorio';
    } else {
        $email = trim($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'El email no es válido';
        }
    }
    
    // Validate password
    if (empty($_POST['password'])) {
        $errors['password'] = 'La contraseña es obligatoria';
    }
    
    // If no errors, process login
    if (empty($errors)) {
        // In a real application, you would:
        // 1. Verify credentials against database
        // 2. Set session variables
        // 3. Redirect to dashboard
        
        // For this demo, we'll just simulate a successful login
        // with a test account (email: test@example.com, password: password123)
        if ($email === 'test@example.com' && $_POST['password'] === 'password123') {
            $success = true;
        } else {
            $errors['login'] = 'Email o contraseña incorrectos';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - FitLife Entrenamiento Personal</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B35',
                        secondary: '#2E4057',
                        light: '#F7F7F7',
                        dark: '#333333',
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-light">
    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="index.html" class="text-2xl font-bold text-primary font-heading">FitLife</a>
                <div class="hidden md:flex space-x-8">
                    <a href="index.html" class="text-secondary hover:text-primary font-medium transition duration-300">Inicio</a>
                    <a href="about.html" class="text-secondary hover:text-primary font-medium transition duration-300">Nosotros</a>
                    <a href="plans.html" class="text-secondary hover:text-primary font-medium transition duration-300">Planes</a>
                    <a href="testimonials.html" class="text-secondary hover:text-primary font-medium transition duration-300">Testimonios</a>
                    <a href="contact.html" class="text-secondary hover:text-primary font-medium transition duration-300">Contacto</a>
                </div>
                <div class="hidden md:flex space-x-4">
                    <a href="login.php" class="px-4 py-2 text-primary font-medium transition duration-300">Iniciar Sesión</a>
                    <a href="register.php" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-opacity-90 transition duration-300">Registrarse</a>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-secondary focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <a href="index.html" class="block py-2 text-secondary hover:text-primary font-medium">Inicio</a>
                <a href="about.html" class="block py-2 text-secondary hover:text-primary font-medium">Nosotros</a>
                <a href="plans.html" class="block py-2 text-secondary hover:text-primary font-medium">Planes</a>
                <a href="testimonials.html" class="block py-2 text-secondary hover:text-primary font-medium">Testimonios</a>
                <a href="contact.html" class="block py-2 text-secondary hover:text-primary font-medium">Contacto</a>
                <div class="flex space-x-4 mt-4">
                    <a href="login.php" class="px-4 py-2 text-primary font-medium transition duration-300">Iniciar Sesión</a>
                    <a href="register.php" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-opacity-90 transition duration-300">Registrarse</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="py-20 bg-secondary">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white font-heading mb-4">Iniciar Sesión</h1>
            <p class="text-white text-lg max-w-3xl mx-auto">Accede a tu cuenta para gestionar tus entrenamientos y seguir tu progreso.</p>
        </div>
    </section>

    <!-- Login Form Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                <?php if ($success): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">¡Inicio de sesión exitoso!</strong>
                        <span class="block sm:inline"> Has iniciado sesión correctamente. Serás redirigido a tu panel de control.</span>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-600 mb-4">Si no eres redirigido automáticamente, haz clic en el siguiente botón:</p>
                        <a href="dashboard.php" class="inline-block px-6 py-3 bg-primary text-white font-medium rounded-md hover:bg-opacity-90 transition duration-300">Ir al Panel de Control</a>
                    </div>
                    <script>
                        // In a real application, this would redirect to the dashboard
                        // setTimeout(() => {
                        //     window.location.href = 'dashboard.php';
                        // }, 3000);
                    </script>
                <?php else: ?>
                    <div class="bg-light p-8 rounded-lg shadow-md">
                        <h2 class="text-2xl font-bold text-secondary font-heading mb-6">Accede a tu cuenta</h2>
                        
                        <?php if (isset($errors['login'])): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                                <span class="block sm:inline"><?php echo $errors['login']; ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <form action="login.php" method="POST" class="space-y-6">
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="w-full px-4 py-2 border <?php echo isset($errors['email']) ? 'border-red-500' : 'border-gray-300'; ?> rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                                <?php if (isset($errors['email'])): ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo $errors['email']; ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <div>
                                <label for="password" class="block text-gray-700 font-medium mb-2">Contraseña</label>
                                <input type="password" id="password" name="password" class="w-full px-4 py-2 border <?php echo isset($errors['password']) ? 'border-red-500' : 'border-gray-300'; ?> rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                                <?php if (isset($errors['password'])): ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo $errors['password']; ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input type="checkbox" id="remember" name="remember" class="mr-2 focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded">
                                    <label for="remember" class="text-gray-700">Recordarme</label>
                                </div>
                                <a href="#" class="text-primary hover:underline">¿Olvidaste tu contraseña?</a>
                            </div>
                            
                            <div>
                                <button type="submit" class="px-6 py-3 bg-primary text-white font-medium rounded-md hover:bg-opacity-90 transition duration-300 w-full">Iniciar Sesión</button>
                            </div>
                        </form>
                        
                        <div class="mt-6 text-center">
                            <p class="text-gray-600">¿No tienes una cuenta? <a href="register.php" class="text-primary hover:underline">Regístrate</a></p>
                        </div>
                        
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <p class="text-center text-gray-600 mb-4">O inicia sesión con</p>
                            <div class="flex justify-center space-x-4">
                                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md flex items-center justify-center hover:bg-gray-50 transition duration-300">
                                    <i class="fab fa-google text-red-500 mr-2"></i>
                                    <span>Google</span>
                                </a>
                                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md flex items-center justify-center hover:bg-gray-50 transition duration-300">
                                    <i class="fab fa-facebook-f text-blue-600 mr-2"></i>
                                    <span>Facebook</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 bg-blue-50 p-4 rounded-lg border border-blue-200">
                        <h3 class="text-lg font-bold text-secondary mb-2">Cuenta de demostración</h3>
                        <p class="text-gray-600 mb-2">Para probar la funcionalidad de inicio de sesión, puedes usar las siguientes credenciales:</p>
                        <ul class="list-disc list-inside text-gray-600">
                            <li>Email: test@example.com</li>
                            <li>Contraseña: password123</li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 font-heading">FitLife</h3>
                    <p class="text-gray-400 mb-4">Transformando vidas a través del entrenamiento personalizado y un estilo de vida saludable.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-primary transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary transition duration-300">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 font-heading">Enlaces Rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="index.html" class="text-gray-400 hover:text-primary transition duration-300">Inicio</a></li>
                        <li><a href="about.html" class="text-gray-400 hover:text-primary transition duration-300">Nosotros</a></li>
                        <li><a href="plans.html" class="text-gray-400 hover:text-primary transition duration-300">Planes</a></li>
                        <li><a href="testimonials.html" class="text-gray-400 hover:text-primary transition duration-300">Testimonios</a></li>
                        <li><a href="contact.html" class="text-gray-400 hover:text-primary transition duration-300">Contacto</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 font-heading">Servicios</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Entrenamiento Personal</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Asesoramiento Nutricional</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Entrenamiento en Grupo</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Programas Online</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Evaluación Física</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 font-heading">Contacto</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary mt-1 mr-3"></i>
                            <span class="text-gray-400">Calle Principal 123, Madrid, España</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-primary mr-3"></i>
                            <span class="text-gray-400">+34 912 345 678</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-primary mr-3"></i>
                            <span class="text-gray-400">info@fitlife.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-primary mr-3"></i>
                            <span class="text-gray-400">Lun-Vie: 7:00 - 21:00</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p class="text-gray-400">&copy; 2023 FitLife - Entrenamiento Personal. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
