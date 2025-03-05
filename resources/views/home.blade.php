<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia Royall</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="logo.png" alt="Logo de la Farmacia">
            </div>

            <div class="search-bar">
                <form action="/buscar" method="GET">
                    <div class="search-container">
                        <input type="text" placeholder="Buscar medicamentos, productos..." name="q">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="login">
                <a href="/login">
                    <img src="{{asset('/images/home/user.png')}}" alt="Login"/>
                    <span>Acceder</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>
        <div class="imagen-central">
            <img src="{{asset('/images/home/imagen-central.jpg')}}" alt="Imagen central de la farmacia">
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <ul>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Sucursales</a></li>
                    <li><a href="#"><i class="fas fa-heart"></i> Afiliados</a></li>
                    <li><a href="#"><i class="fas fa-phone"></i> Contacto</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Información</h3>
                <ul>
                    <li><a href="#"><i class="fas fa-info-circle"></i> Sobre Nosotros</a></li>
                    <li><a href="#"><i class="fas fa-shield-alt"></i> Políticas</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i> Ayuda</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Redes Sociales</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 Farmacia Royall. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
