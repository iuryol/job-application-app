<div class="bg-gray-900 text-gray-300 py-2 absolute bottom-0 w-full">
    <div class="container mx-auto px-4">
        @guest
            <div class="grid grid-cols-1 border-b border-gray-700 md:grid-cols-2 pb-2 gap-6">
                <!-- Sobre nós -->
                <div>
                    <h3 class="text-lg font-semibold text-white">Sobre Nós</h3>
                    <p class="mt-2 text-sm">
                        Nossa plataforma conecta empresas e profissionais de forma rápida e eficiente.
                    </p>
                </div>

                <!-- Redes Sociais -->
                <div>
                    <h3 class="text-lg font-semibold text-white">Nos Siga</h3>
                    <div class="mt-2 flex space-x-4">
                        <a href="#" class="hover:text-blue-400 transition">Facebook</a>
                        <a href="#" class="hover:text-blue-400 transition">Twitter</a>
                        <a href="#" class="hover:text-blue-400 transition">Instagram</a>
                        <a href="#" class="hover:text-blue-400 transition">LinkedIn</a>
                    </div>
                </div>
            </div>
        @endguest

        <!-- Copyright - Sempre visível -->
        <div class="text-center flex justify-center items-center text-sm  border-gray-700 pt-2">
            &copy; {{ date('Y') }} Todos os direitos reservados.
        </div>
    </div>
</div>
