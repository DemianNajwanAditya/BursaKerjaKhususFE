<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <button class="close-btn" onclick="toggleSidebar()">&times;</button>
        
        <div class="sidebar-header">
            <div>
                <div class="sidebar-logo">BKK</div>
                <div class="sidebar-title">BKK OPAT</div>
            </div>
        </div>
        
        <nav class="sidebar-menu">
            <ul>
                <li>
                    <a href="#" class="sidebar-link">
                        <span class="icon">🏠</span>
                        <span>Beranda Utama</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link">
                        <span class="icon">👤</span>
                        <span>Lowongan Kerja</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link">
                        <span class="icon">📊</span>
                        <span>Lowongan Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link">
                        <span class="icon">⚙️</span>
                        <span>Perusahaan</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link">
                        <span class="icon">📝</span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header Utama -->
        <div class="dashboard-main-header">
            <div class="header-left">
                <button class="menu-btn" onclick="toggleSidebar()">&#9776;</button>
            </div>
            <div class="header-center">
                <h1>Selamat Datang, asep</h1>
            </div>
            <div class="header-right">
                <button class="notif-btn">🔔</button>
            </div>
        </div>

        <!-- Background Foto -->
        <div class="dashboard-header-bg">
            <div class="dashboard-header-bg" style="background-image: url('{{ asset('images/lapangan.jpeg') }}');">
            <div class="overlay">
                <h2>SMK Negeri 4 Bandung</h2>x  
            </div>
        </div>
x`
           <div>
                <h2 class="section-title">LOWONGAN TERBARU</h2>
                <div class="lowongan-grid">
                    <!-- Sample Lowongan Cards -->
                    <div class="lowongan-card">
                        <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="PT Kaizen Jaya Abadi" class="lowongan-image">
                        <div class="lowongan-content">
                            <div class="lowongan-company">PT Kaizen Jaya Abadi</div>
                            <h3 class="lowongan-title">Operator Produksi</h3>
                            
                            <div class="lowongan-details">
                                <div>
                                    <span class="icon">📍</span>
                                    <span>Kabupaten - Sukabumi</span>
                                </div>
                                <div>
                                    <span class="icon">💰</span>
                                    <span>Rp 3.500.000 - Rp 4.000.000</span>
                                </div>
                                <div>
                                    <span class="icon">👥</span>
                                    <span>Membutuhkan sebanyak 25 orang dengan kualifikasi Lulusan Semua Jurusan SMK, fresh graduate boleh melamar</span>
                                </div>
                            </div>
                            
                            <div class="lowongan-meta">
                                <span>Batas: 29 Des</span>
                                <a href="#" class="btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <div class="lowongan-card">
                        <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="PT Kaizen Jaya Abadi" class="lowongan-image">
                        <div class="lowongan-content">
                            <div class="lowongan-company">PT Kaizen Jaya Abadi</div>
                            <h3 class="lowongan-title">Staff Administrasi</h3>
                            
                            <div class="lowongan-details">
                                <div>
                                    <span class="icon">📍</span>
                                    <span>Kabupaten - Sukabumi</span>
                                </div>
                                <div>
                                    <span class="icon">💰</span>
                                    <span>Rp 4.000.000 - Rp 4.500.000</span>
                                </div>
                                <div>
                                    <span class="icon">👥</span>
                                    <span>Membutuhkan sebanyak 5 orang dengan kualifikasi Lulusan OTKP/AKL, pengalaman 1-2 tahun</span>
                                </div>
                            </div>
                            
                            <div class="lowongan-meta">
                                <span>Batas: 30 Des</span>
                                <a href="#" class="btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <div class="lowongan-card">
                        <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="PT Kaizen Jaya Abadi" class="lowongan-image">
                        <div class="lowongan-content">
                            <div class="lowongan-company">PT Kaizen Jaya Abadi</div>
                            <h3 class="lowongan-title">Teknisi Mesin</h3>
                            
                            <div class="lowongan-details">
                                <div>
                                    <span class="icon">📍</span>
                                    <span>Kabupaten - Sukabumi</span>
                                </div>
                                <div>
                                    <span class="icon">💰</span>
                                    <span>Rp 4.500.000 - Rp 5.000.000</span>
                                </div>
                                <div>
                                    <span class="icon">👥</span>
                                    <span>Membutuhkan sebanyak 10 orang dengan kualifikasi Lulusan TMI/TKJ, fresh graduate boleh melamar</span>
                                </div>
                            </div>
                            
                            <div class="lowongan-meta">
                                <span>Batas: 02 Jan</span>
                                <a href="#" class="btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Close sidebar when clicking on a link (optional)
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', () => {
                toggleSidebar();
            });
        });

        // Close sidebar with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                
                if (sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                }
            }
        });
    </script>

      <!-- Footer -->
  <footer>
  <div class="footer-info">
    <!-- Kiri -->
    <div class="alamat">
      <div class="logo-footer">
        <img src="images/logo-jabar.png" alt="Logo 1">
        <img src="images/tut.png" alt="Logo 2">
        <img src="images/smkn4.png" alt="Logo 3">
      </div>
      <h3>SMK NEGERI 4 BANDUNG</h3>
      <p>
        Jl. Kliningan No.6, Turangga, Kec. Lengkong<br>
        Telp/Fax : (022) – 7303736<br>
        Kode Pos : 40264 Kota Bandung<br>
        Provinsi Jawa Barat<br>
        Indonesia
      </p>
    </div>

    <!-- Kanan -->
    <div class="tautan">
      <a href="https://disdik.jabarprov.go.id/">Dinas Pendidikan Jawa Barat</a>
      <a href="https://kemendikdasmen.go.id/">Kementrian Pendidikan dan Kebudayaan</a>
      <a href="https://referensi.data.kemendikdasmen.go.id/">Referensi Pendidikan</a>
      <a href="https://data.komdigi.go.id/article/literasi-digital-indonesia">Digital Literasi</a>
      <a href="https://smkbisa.id/">Smk Bisa</a>
    </div>
  </div>

  <!-- Sosmed -->
  <div class="sosmed">
    <a href="https://instagram.com/smknegeri4bandung"><img src="images/instagram.png" alt="Instagram"></a>
    <a href="https://facebook.com/smkn4bandung"><img src="images/facebook.png" alt="Facebook"></a>
  </div>

  <!-- Copyright -->
  <div class="copyright">
    <p>2025 <strong>smkn4bdg.sch.id</strong> All Rights Reserved</p>
  </div>