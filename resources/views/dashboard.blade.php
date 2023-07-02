<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                <h1 class="font-bold mb-4" style="font-size: 2.5rem; background: linear-gradient(to right, #000000, #ff0000, #ffffff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); border-bottom: 2px solid rgba(0, 0, 0, 0.3);">Bienvenido - Alerta de Crimen</h1>
                    <p class="text-gray-800">
                        ¡Gracias por iniciar sesión! Alerta de Crimen es una aplicación diseñada para ayudarte a mantenerte informado sobre la seguridad en tu área. Aquí encontrarás noticias y alertas sobre delitos, así como recursos para reportar incidentes y mantener tu comunidad segura.
                    </p>
                </div>
                <div align="center">
                    <img src="images/a.jpg" class="img-fluid rounded" alt="Imagen" width="800" height="500">
                </div>
                <div class="p-6 text-gray-900">
                    <p class="text-center">&copy; {{ date('Y') }} Alerta de Crimen. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>