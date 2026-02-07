        <!-- Footer -->
        <footer class="bg-white border-t px-6 py-4 text-sm text-gray-500 text-center mt-auto">
            © 2026 <b>LASMURA DKI Jakarta</b> – Admin Panel
        </footer>
        </div>
        </div>

        <!-- Sidebar Script -->
        <script>
            const openBtn = document.getElementById('openSidebar');
            const closeBtn = document.getElementById('closeSidebar');
            const mobileSidebar = document.getElementById('mobileSidebar');

            if (openBtn) {
                openBtn.addEventListener('click', () => {
                    mobileSidebar.classList.remove('hidden');
                });
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    mobileSidebar.classList.add('hidden');
                });
            }


            // Auto-close Flash Alerts
            const alerts = document.querySelectorAll('.js-flash-alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = "opacity 0.6s ease, transform 0.6s ease";
                    alert.style.opacity = "0";
                    alert.style.transform = "translateY(-10px)";
                    setTimeout(() => alert.remove(), 600);
                }, 3500);
            });
        </script>


        </body>

        </html>