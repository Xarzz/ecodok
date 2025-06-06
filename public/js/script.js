        // Set current date
        document.getElementById('current-date').textContent = new Date().toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // Page navigation
        function showPage(pageId) {
            // Hide all pages
            document.querySelectorAll('.page-content').forEach(page => {
                page.classList.add('hidden');
            });
            
            // Show selected page
            document.getElementById(pageId + '-page').classList.remove('hidden');
            
            // Update active nav item
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active', 'bg-blue-50', 'text-blue-600', 'border-blue-500');
            });
            
            // Add active class to current nav item
            event.target.closest('.nav-item').classList.add('active', 'bg-blue-50', 'text-blue-600', 'border-blue-500');
            
            // Close mobile menu
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        // Initialize active nav item
        document.querySelector('.nav-item').classList.add('active', 'bg-blue-50', 'text-blue-600', 'border-blue-500');

        // Close modals when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
        });