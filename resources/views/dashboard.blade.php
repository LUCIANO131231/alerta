<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <div>
                        <img src="images/alerta.gif" alt="Logo" class="h-10 mr-2">
                    </div>
                    <h1 class="font-bold mb-4 text-4xl leading-tight text-transparent bg-gradient-to-r from-black via-red-500 to-white bg-clip-text text-shadow">Bienvenido - Alerta de Crimen</h1>
                    <p class="text-gray-800">
                        ¡Gracias por iniciar sesión! Alerta de Crimen es una aplicación diseñada para ayudarte a mantenerte informado sobre la seguridad en tu área. Aquí encontrarás noticias y alertas sobre delitos, así como recursos para reportar incidentes y mantener tu comunidad segura.
                    </p>
                </div>
                <div class="flex justify-center items-center">
                    <div class="w-4/5 sm:w-3/5 md:w-2/5 lg:w-1/3">
                        <img src="images/a.jpg" class="rounded-lg shadow-lg" alt="Imagen">
                    </div>
                </div>
                <div class="p-6 text-center text-gray-900">
                    <p>&copy; {{ date('Y') }} Alerta de Crimen. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
