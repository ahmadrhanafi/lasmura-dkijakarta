    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Auto-close Flash Alerts
            const alerts = document.querySelectorAll('.js-flash-alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = "opacity 0.6s ease, transform 0.6s ease";
                    alert.style.opacity = "0";
                    alert.style.transform = "translateY(-10px)";
                    setTimeout(() => alert.remove(), 600);
                }, 5000);
            });

            // Toggle Password Visibility
            const passwordInput = document.querySelector('#password');
            const toggleButton = document.querySelector('#togglePassword');
            const eyeIcon = document.querySelector('#eyeIcon');

            if (toggleButton) {
                toggleButton.addEventListener('click', function() {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    eyeIcon.classList.toggle('fa-eye');
                    eyeIcon.classList.toggle('fa-eye-slash');
                });
            }
        });
    </script>
    </body>

    </html>