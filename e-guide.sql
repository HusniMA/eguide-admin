-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2020 at 05:17 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_destinasi`
--

CREATE TABLE `tb_destinasi` (
  `id_destinasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `saran` text NOT NULL,
  `lokasi` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_destinasi`
--

INSERT INTO `tb_destinasi` (`id_destinasi`, `id_user`, `saran`, `lokasi`, `lat`, `lng`) VALUES
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'loaski 1', 989913221, 231123213),
(4, 1, 'Test saran', 'Mie Ayam & Bakso Pamungkas, Jalan Kaliurang Km 13.5, Sleman, Yogyakarta 55581, Indonesia', -7.6936454853298, 110.41848242283),
(5, 3, 'Test saran 3', 'Ganesha Operation, Ruko Candi Indah, Sleman, Yogyakarta 55581, Indonesia', -7.7094337586447, 110.41000597179),
(6, 1, 'Tessss', 'Godean, 55264, Sleman, Yogyakarta, Indonesia', -7.77278, 110.27722),
(7, 6, 'sonosewu water sprinh', 'Universitas PGRI Yogyakarta, Jl. Sonosewu, Bantul, Yogyakarta 55182, Indonesia', -7.806311, 110.341043);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `kota`, `kecamatan`, `alamat`, `lat`, `lng`) VALUES
(10, 'Klaten', 'Polanharjo', 'Jeblog, Karanganom, 57475, Klaten, Central Java Province, Indonesia', -7.61917, 110.63861),
(13, 'Tegal 1', 'Bumijawa', 'Cempaka, Bumijawa, 52466, Tegal, Central Java Province, Indonesia', -7.18083, 109.06667),
(14, 'pemalang 1', 'bantar bolang', 'Bantarbolang, 52352, Pemalang, Central Java Province, Indonesia', -7.0362, 109.3938),
(15, 'Baturaden', 'sumbang', 'Limpakuwus, Sumbang, 53183, Banyumas, Central Java Province, Indonesia', -7.28694, 109.24333),
(16, 'Ajibarang', 'pancasan', 'Pancasan, Ajibarang, 53163, Banyumas, Central Java Province, Indonesia', -7.4275, 109.0775),
(17, 'Temanggung', 'purbosari', 'Temanggung, Central Java Province, Indonesia', -7.3, 110.16667),
(18, 'Ungaran', 'sidomukti', 'Sidomukti, Bandungan, 50661, Semarang, Central Java Province, Indonesia', -7.21, 110.39),
(19, 'Magelang', 'Candimulyo', 'Tampir Kulon, Candimulyo, 56191, Magelang, Jawa Tengah, Indonesia', -7.53, 110.25),
(20, 'Salatiga', 'Tengaran', 'Bener, Tengaran, 50775, Semarang, Central Java Province, Indonesia', -7.37111, 110.51944),
(21, 'Purbalingga', 'bojongsari', 'Owabong Waterpark, Jalan Owabong No. 1, Purbalingga, Central Java Province 53362, Indonesia', -7.348985, 109.349406),
(22, 'kebumen', 'alian', 'Krakal, Alian, 54352, Kebumen, Central Java Province, Indonesia', -7.60528, 109.70139),
(23, 'Gorontalo', 'asala', 'Gorontalo Province, Indonesia', 0.66667, 123),
(24, 'Yogyakarta', 'kasihan', 'Yogyakarta, Special Region of Yogyakarta, Indonesia', -7.80139, 110.36444);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penginapan`
--

CREATE TABLE `tb_penginapan` (
  `id_penginapan` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `tarif` int(12) NOT NULL,
  `foto` text NOT NULL,
  `deskripsi` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penginapan`
--

INSERT INTO `tb_penginapan` (`id_penginapan`, `id_wisata`, `nama`, `alamat`, `kontak`, `tarif`, `foto`, `deskripsi`, `lat`, `lng`) VALUES
(3, 52, 'Pandu Homestay', 'Masjid Al Amin, Ponggok, Polanharjo, Klaten, Jawa Tengah 57474, Indonesia', '081548569902', 1500000, '[\"cb08f6e92ae1edc96bee0260290d7389.jpg\",\"cc15f4530315c95a052ecb4486cfdc0a.jpg\",\"45ca195d81f9ec6730002174660eb234.jpg\",\"b1769e1271f788f29d16be7c0b18c424.jpg\"]', 'pandu homestay ada 6 kamar yaitu 3 kamar dengan fasilitas km dalam tv kipas,dan 3 kamar lagi dengan fasilitas km dalam tv AC, free WiFi kopi teh gratis bikin sendiri ada dapurnya. Berlokasi di Ponggok, polanharjo 100m dari Umbul Ponggok\nFASILITAS : \n- Keamanan 24 Jam \n- Masuk Mobil \n- Dekat Pusat Perbelanjaan\n- Pusat Kebugaran\n- Dekat Jalan Raya\n- Dekat Kawasan Bisnis\n- Dekat Tempat Ibadah\n\nKONTAK \nAlamat : Ponggok, Polanharjo, Klaten\nTelepon :081548569902\n\n.', -7.613761, 110.637137),
(4, 52, 'Hotel Srikandi Delanggu', 'Banaran, Delanggu, 57471, Klaten, Central Java Province, Indonesia', '(0272)326715', 160000, '[\"c65fc924bfaf97c3744f5a84b85e5c7e.jpg\",\"1761d8c71a7e77d7561f6f56cbe6d096.jpg\",\"96144d541294b7a16b0a258782288bf7.jpg\",null]', 'Penginapan yang tenang dan nyaman di delanggu. Hotel srikandi delanggu sebuah hunian yang berlokasi di delanggu, klaten. Suasana ruangan yang bersih dan nyaman, cocok bagi anda yang akan berlibur atau mengadakan kungjungan bisnis. Lokasi strategis sehingga mudah untuk akses dan harga  yang terjangkau bisa menjadi pilihan akomodasi perjalanan anda.\nFASILITAS :  \n- Ruangan AC\n- Hot Water \n- Free Breakfast\n- Free Wifi\n- Parkir \nKONTAK \nAlamat : jalan Solo - Klaten , Kaliwingko, Banaran, Delanggu, Delanggu, Klaten, Jawa Tengah\nTelepon : (0272) 326715\n', -7.6375, 110.68528),
(5, 52, 'Homestay Pondok Asri ', 'Pondok, Karanganom, 57475, Klaten, Jawa Tengah, Indonesia', '(0276)323760', 200000, '[\"5f999199b9141cf41dc64336eae7c2ed.jpg\",\"ef0fa47dd28fb6e3135fb94e1ee8e8f5.jpg\",\"e7bea804c014b998c6c7223c6e8a1ea2.jpg\",\"c6ac1ab053b062aa1ce47ae14b78cdd6.jpg\"]', 'Penginapan dengan kamar simpel menyediakan TV, kipas angina/AC, dan kamar mandi dalam. Kamar dan suite di kelas yang lebih tinggi memiliki AC. Kamar keluarga tersedia. Sarapan tersedia gratis. Fasilitas lainnya meliputi restoran dan karaoke. Tempat parkir juga ditawarkan.\nFASILITAS :  \n- Wi-Fi gratis\n- Sarapan gratis \n- Parkir gratis \n- Layanan kamar AC\nKONTAK \nAlamat : JL. Perintis Kemerdekaan no.9 , Boyolali, Jawa Tengah\nTelepon : (0276) 323760\n', -7.62861, 110.63917),
(6, 44, 'Homestay Pondok Asri', 'Pondok, Karanganom, 57475, Klaten, Jawa Tengah, Indonesia', '(0276)323760', 200000, '[\"4b148c201c7dff6e98b3547115d3155a.jpg\",\"6e012c9be457e833b7504e6f0c782f33.jpg\",\"5dbf1af864628adb06ac6606a4515f53.jpg\",\"8c6f41460fe83848857d32a172612cfb.jpg\"]', 'Penginapan dengan kamar simpel menyediakan TV, kipas angina/AC, dan kamar mandi dalam. Kamar dan suite di kelas yang lebih tinggi memiliki AC. Kamar keluarga tersedia. Sarapan tersedia gratis. Fasilitas lainnya meliputi restoran dan karaoke. Tempat parkir juga ditawarkan.\nFASILITAS : \n- Wi-Fi gratis\n - Sarapan gratis\n- Parkir gratis \n- Layanan kamar AC\nKONTAK \nAlamat : JL. Perintis Kemerdekaan no.9 , Boyolali City Center, Boyolali, Jawa Tengah\nTelepon : (0276) 323760\n', -7.62861, 110.63917),
(7, 44, 'Hotel Srikandi Delanggu', 'Banaran, Delanggu, 57471, Klaten, Central Java Province, Indonesia', '12345', 160000, '[\"72e30d94da7b070d7279c51e0fd69ed2.jpg\",\"2e67069200d573beeaf29a7173b53c7d.jpg\",\"e09ba3f32582d2e5f06275f789f81a77.jpg\",null]', 'Penginapan yang tenang dan nyaman di delanggu. Hotel srikandi delanggu sebuah hunian yang berlokasi di delanggu, klaten. Suasana ruangan yang bersih dan nyaman, cocok bagi anda yang akan berlibur atau mengadakan kungjungan bisnis. Lokasi strategis sehingga mudah untuk akses dan harga  yang terjangkau bisa menjadi pilihan akomodasi perjalanan anda.\nFASILITAS :\n-  Ruangan AC\n- Hot Water\n- Free Breakfast\n- Free Wifi\n- Parkir \nKONTAK \nAlamat : jalan Solo - Klaten , Kaliwingko, Banaran, Delanggu, Delanggu, Klaten, Jawa Tengah\nTelepon : (0272) 326715\n', -7.6375, 110.68528),
(8, 40, 'Green Mulia Resort', 'RM Selera Rasa®, Jalan Bumiayu - Ajibarang, Banyumas, Jawa Tengah 53163, Indonesia', '12345', 250000, '[\"a7e80be0f2c6cf7ecf4c85deb0b3ab04.jpg\",\"45bb09fa9858a04c046f0415ff658bd0.jpg\",\"c7f0c34f8e794bb2a45d3fb8d01fa499.jpg\",\"5e3fd7bce7f849ce0f19261da21e0fe6.jpg\"]', 'Green mulia adalah hotel berbintang 2 dengan view panorama alam pedesaan yang sangat indah, terletak di Kecamatan Ajibarang, 18 KM dari kota Purwokerto, kabupaten Banyumas. Lokasinya tepat ditepi jalan utama Purwokerto - Tegal. fasilitas utama adalah:\nFASILITAS :\n- Ruangan Kamar AC\n- Kamar mandi dalam\n- Tempat parkir Luas\n- Lapangan Tenis\n- Meeting room\n- Kolam renang\n- Kolam pemancingan \nKONTAK \nAlamat : Jl. Raya Ajibarang Km 1, Ajibarang - Jawa Tengah\nTelepon : 0281) 572305 / 081226859282\n', -7.405056, 109.076152),
(9, 39, 'Green Mulia Resort', 'RM Selera Rasa®, Jalan Bumiayu - Ajibarang, Banyumas, Jawa Tengah 53163, Indonesia', '12345', 250000, '[\"23c68432c7af77c0895cc1ae7be5c287.jpg\",\"aee195f3f90fc5dfef11383e05d4bf96.jpg\",\"f8683e307a901ad78cb0e9082bc9b212.jpg\",\"2891cfae4c00e130761a607c6e867895.jpg\"]', 'Green mulia adalah hotel berbintang 2 dengan view panorama alam pedesaan yang sangat indah, terletak di Kecamatan Ajibarang, 18 KM dari kota Purwokerto, kabupaten Banyumas. Lokasinya tepat ditepi jalan utama Purwokerto - Tegal. fasilitas utama adalah:\nFASILITAS :\n- Ruangan Kamar AC\n- Kamar mandi dalam\n- Tempat parkir Luas\n- Lapangan Tenis \n- Meeting room\n- Kolam renang\n- Kolam pemancingan \nKONTAK \nAlamat : Jl. Raya Ajibarang Km 1, Ajibarang - Jawa Tengah\nTelepon : 0281) 572305 / 081226859282', -7.405056, 109.076152),
(10, 54, 'Hotel Catur', 'Hotel Catur, Jl. Mayjen Bambang Soegeng No. 308, Magelang, Jawa Tengah 56172, Indonesia', '(0293) 326980', 240, '[\"f03168e5890c7405340494640017237e.jpg\",\"691d0279aceb2e5e105937afef9797aa.jpg\",\"54058ce9aea6d6cc57bbd3d6d812796a.jpg\",\"44f160c5637e4f9bd6e8d7101f7613f0.jpg\"]', 'Penginapan yang Ideal untuk bisnis atau kepuasan di kota Magelang Terletak di kota Magelang, Jawa Tengah, Hotel Catur adalah penginapan yang ideal baik untuk bisnis atau kepuasan. Dirancang dengan perpaduan sempurna tradisional dan arsitektur Jawa modern, penginapan ini menyediakan 26 kamar. Fasilitas lainnya juga tersedia seperti Wi-Fi gratis di semua kamar, TV, AC, restoran, Wi-fi di tempat umum dan tempat parkir yang menjamin kenyamanan bagi Anda semua.\nFASILITAS : \n- Parkir area\n- Cleaning services\n- Coffe shop\n- Wifi\n- Ruangan AC\n- TV\n- Restaurant\nKONTAK \nAlamat : Jl. Mayjend Bambang Sugeng No. 308, Mertoyudan, Magelang\nTelepon : (0293) 326980', -7.514714, 110.225691),
(11, 60, 'Hotel Catur', 'Hotel Catur, Jl. Mayjen Bambang Soegeng No. 308, Magelang, Central Java Province 56172, Indonesia', '12333', 240, '[\"0c667c0b076fffa403ce7dc8570fb0fa.jpg\",\"018a7bf922c3df35f6ebf7efeb139f79.jpg\",\"f9ef1f683b73efe33e5fb44efc688838.jpg\",null]', 'Penginapan yang Ideal untuk bisnis atau kepuasan di kota Magelang Terletak di kota Magelang, Jawa Tengah, Hotel Catur adalah penginapan yang ideal baik untuk bisnis atau kepuasan. Dirancang dengan perpaduan sempurna tradisional dan arsitektur Jawa modern, penginapan ini menyediakan 26 kamar. Fasilitas lainnya juga tersedia seperti Wi-Fi gratis di semua kamar, TV, AC, restoran, Wi-fi di tempat umum dan tempat parkir yang menjamin kenyamanan bagi Anda semua.\nFASILITAS :\n- Parkir area\n- Cleaning services\n- Coffe shop\n- Wifi\n- Ruangan AC\n- TV\n- Restaurant\nKONTAK \nAlamat : Jl. Mayjend Bambang Sugeng No. 308, Mertoyudan, Magelang\nTelepon : (0293) 326980\n', -7.514714, 110.225691),
(12, 59, 'Hotel Perdana', 'Hotel Perdana Raya, Jalan Pemuda No. 218, Klaten, Central Java Province 57423, Indonesia', '123123', 125, '[\"099578a2d5b6ab9d6df96ca961455bc7.jpg\",\"8831c53d71776b42ae8e0e0aada6e289.jpg\",\"abbf7da7e24ee74a5e9353ffea3b0d3e.jpg\",null]', 'Terletak di Klaten,dengan menyediakan kamar-kamar ber-AC. Hotel bintang 2 ini menawarkan resepsionis 24 jam, layanan kamar, dan Wi-Fi gratis. Di hotel, setiap kamar dilengkapi dengan meja, TV layar datar, dan kamar mandi pribadi\nFASILITAS :\n- Wifi Parkir\n- Layanan kamar\n- Ruang keluarga\n- Ruangan AC + TV\nKONTAK \nAlamat :  Jl. Pemuda Sel. No.218 B, Pondok, Klaten, Kec. Klaten Tengah, Kabupaten Klaten, Jawa Tengah 57411\nTelepon : (0272) 321113', -7.707871, 110.597684),
(13, 58, 'Homestay Maqmil', 'Boko Harjo, Prambanan, 55572, Sleman, Central Java Province, Indonesia', '123123', 89999, '[\"2f4b8095c475540b7698916914fa47cf.jpg\",\"5583aaeafa5a8b984bcce39d7ade50f8.jpg\",\"4b611e1c04dd89fdf6617e1ef5db374d.jpg\",\"aacfbf5bde04c6af997ff9435fbf6d77.jpg\"]', 'Maqmil menawarkan akomodasi dengan lounge bersama, taman, serta dapur bersama untuk kenyamanan Anda. Terdapat juga Wi-Fi gratis dan tempat parkir pribadi gratis. Homestay ini memiliki kamar mandi bersama yang lengkap dengan shower dan perlengkapan mandi gratis. Akomodasi ini memiliki teras, dan Anda dapat bersepeda di daerah terdekat.\nFASILITAS : \n- Wifi Parkir\n- Layanan kamar\n- Ruang keluarga\n- Ruangan Kipas Angin + TV\n- Laundry\nKONTAK \nAlamat :  Boko Harjo RT 01, RW.04, Klurak Baru, Bokoharjo, Kec. Prambanan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55572\nTelepon : 0815-7959-229\n', -7.7553, 110.4917),
(14, 60, 'MesaStila Resort', 'Java Red Restaurant @MesaStila, Magelang, Jawa Tengah 56196, Indonesia', '123123', 1700000, '[\"057c73976d19d977525ddc3b57a13b44.png\",\"c1df2249834892c322b933f45c718ac1.png\",\"0f76666327766af473e2bd7be262095f.png\",\"03e6aea10f27f22120025c305e6dce5a.png\"]', 'Deskripsi : MesaStila Resort adalah sebuah resort yang berlokasi ditengan perkebunan kopi & dekat dengan pegunungan di daerah Grabag Magelang Jawa Tengah. Resort ini sudah lama berdiri dengan gaya arsitektur jawa kuno. Front office / Receptionost adalah Bangunan kayu bekas Stasiun Kereta Api Mayong dari Jepara yang dibuat pada Tahin 1843. Resort ini sangat cocok untuk peristirahatan / liburan. Dengan mempunyai fasilitas Kamar AC, Ruang keluarga, Balkon pribadi dengan pemandangan alam terbuka, TV Layar Datar dan coffe walk.\nFASILITAS : \n- Parkir\n- Kolam renang\n- Wifi \n- Ruangan Gym\n- Sarapan pagi\n- Lapangan Tenis\nKONTAK \nAlamat :  Jl. Losari, Rw.3, Losari, Kec. Grabag, Magelang, Jawa Tengah 56196\nTelepon : (0298) 596333\nWeb/Blog : https://www.mesahotelsandresorts.com/mesastila/\n', -7.328608, 110.329139),
(15, 60, 'Hotel Griya Katarina', 'Hotel Griya Wijaya, Jl. Tentara pelajar No 90, Semarang, Central Java Province 50614, Indonesia', '123123', 239990, '[\"c4485cd1feb2c730743737148a16ab38.png\",\"8a29c4a912468e0e973256f409a8367e.png\",\"61e6e9f589d4cb2e0896d9c43982b0c0.png\",\"56793e8e02fb5e9837f6abce5a4e04c8.png\"]', 'Deskripsi : Salah satu hotel yang berada di ambarawa Berlokasi di Jalan Tentara Pelaja. Hotel ini memiliki produk andalannya yaitu jasa hotel nyaman harga bersahabat yang mampu memberikan / menyediakan service terbaik untuk seluruh pelanggan setianya.. Sarapan adalah cukup baik.\nPemandangan yang sangat bagus. Anda dapat melihat rawa Pening dan Merbabu.\nFASILITAS :\n- Parkir\n- Restaurant\n- Coffe Shop\n- Massage\n- Free Wifi\n- Ruangan ber-AC\n- TV \nTarif : 239.990\nKONTAK \nAlamat :   Jalan Tentara Pelajar, Panjang, Ambarawa, Kerep, Panjang, Kec. Ambarawa, Semarang, Jawa Tengah 50614\nTelepon : (0298) 591940', -7.255937, 110.399365),
(16, 56, 'Hotel Griya Katarina', 'Hotel Griya Wijaya, Jl. Tentara pelajar No 90, Semarang, Central Java Province 50614, Indonesia', '123', 239990, '[\"8f91cfa14272688eb42352f87b759a9b.png\",\"29100e15c8141736b592366e48e12683.png\",\"640df201de38b2a68b4d258fcd37278b.png\",\"92f9e28cbb421de47a095469eb97172b.png\"]', 'Deskripsi : Salah satu hotel yang berada di ambarawa Berlokasi di Jalan Tentara Pelaja. Hotel ini memiliki produk andalannya yaitu jasa hotel nyaman harga bersahabat yang mampu memberikan / menyediakan service terbaik untuk seluruh pelanggan setianya.. Sarapan adalah cukup baik.\nPemandangan yang sangat bagus. Anda dapat melihat rawa Pening dan Merbabu.\nFASILITAS :\n- Parkir\n- Restaurant\n- Coffe Shop\n- Massage\n- Free Wifi\n- Ruangan ber-AC\n- TV \n Tarif : 239.990\nKONTAK \nAlamat :   Jalan Tentara Pelajar, Panjang, Ambarawa, Kerep, Panjang, Kec. Ambarawa, Semarang, Jawa Tengah 50614\nTelepon : (0298) 591940\n', -7.255937, 110.399365);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `id_wisata`, `id_user`, `rating`) VALUES
(5, 23, 2, 4),
(6, 23, 1, 5),
(7, 24, 2, 3),
(8, 25, 1, 3),
(9, 22, 2, 2),
(10, 23, 1, 4),
(11, 23, 1, 5),
(12, 26, 1, 4),
(13, 26, 3, 4),
(14, 26, 1, 5),
(15, 22, 3, 5),
(16, 26, 4, 5),
(17, 60, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'wkwk', 'wkwk123', 'wkwk123'),
(2, 'aziz', 'aziz123', 'aziz123'),
(3, 'fadil', 'fadil123', '123'),
(4, 'aku siapa', 'aku123', 'akutau'),
(5, 'gundul', 'gundul123', '12345'),
(6, 'hari', 'hari', '54321');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga_tiket` int(12) NOT NULL,
  `foto` text,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `link` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `id_lokasi`, `nama`, `harga_tiket`, `foto`, `deskripsi`, `alamat`, `lat`, `lng`, `link`) VALUES
(36, 13, 'objek wisata tuk mudal', 0, '[\"45febb1806e8ecaa9f1d91a57c5f73c6.jpg\",\"a896e3dfe43c68cd7192a0417fe4421f.jpg\",\"48eda66c6ad1d07ea27b3056a2ae1bc6.jpg\",\"\"]', '<p>Tuk mudal merupakan objek wisata sekarang ini menjadi ramai perbincangan warganet di media sosial. karena tempatya yang keren dan adem. udara khas pegunungan, gemercik air yang mengalir di saluran irigasi sekitarnya menambah kesan bahwa tempat ini masih asri. apalagi, airnya sangat jernih dan dingin. sejumlah anak-anak pun asyik mandi dan berenang.</p>', 'Cempaka, Bumijawa, 52466, Tegal, Central Java Province, Indonesia', -7.18083, 109.06667, 'https://www.instagram.com/explore/tags/tukmudal/'),
(37, 14, 'Wisata mata air getek', 5000, '[\"5093cb0c5ed0b7334ac35482b9c04c79.jpg\",\"f2faaf4cc31554056a15fb05102b36b7.jpg\",\"7c6a5e1a456dcec1a72f0c9aaf392abc.jpg\",null]', '<p>Wisata oklam renang panorama mata air getek, yang terletak di kecamatan bantarbolang pemalang, kini hadir memberikan hiburan dan sensasi untuk keluarga berlibur kolam renang dewasa dengan air bersih langsung dari sumber mata air. sehingga kolam renang ini memiliki kesejukan dan kesegaran serta air yang mengalur sangat bersih bebas dari kotoran karena air tersebut langsung berasal dari mata air.</p><p>fasilitas : Pakir , Toilet, Persewaan Ban untuk renang, Ruang Ganti , Tempat Makan dan Taman</p><p>jam buka : 07.00 - 17.00</p><p>kontak : 0823-2490-5474</p>', 'Ikan Bakar Bu Ana, Jalan Raya Karang Moncol, Pemalang, Jawa Tengah 52352, Indonesia', -7.038786, 109.376128, 'https://www.instagram.com/explore/tags/mataairgetek/'),
(38, 15, 'Telaga sunyi', 10000, '[\"f65cb9eca320b5568b60a08642a954ce.jpg\",\"67fb1706fbc41509b479351ac8043d1a.jpg\",\"94d2ef7df68e707b7ffbc9985942e0df.jpg\",\"47f64cde13a271635192279a9d428588.jpg\"]', '<p>Telaga sunyi ini juga didukung oleh pesona alam yang asri, udaranya yang sejuk dll. cocok seklai buat anda yang ingin melepaskan penat setelah bekerja atau menjadi jadwla liburan diweekend ini. Air di telaga sunyi baturaden ini juga jernih sehingga anda dapat bermain air, berenang atau hanya sekedar berfoto dengan backround pesona telaga dan alamnya. Untuk masuk ke telaga sunyu baturaden ini yang indah ini anda tidak perlu mergo kocek yang dalam . Cukup membayar dengan harga yang murah anda menikmatinya sampai puas.</p><p>Jam buka : 07.00 - 17.00 WIB</p><p>Parkir : Rp. 2000 untuk motor , dan mobil Rp. 3000</p>', 'Limpakuwus, Sumbang, 53183, Banyumas, Central Java Province, Indonesia', -7.28694, 109.24333, 'https://www.instagram.com/explore/tags/telagasunyi/'),
(39, 0, 'Objek wisata pancasan', 8000, '[\"de6c6d14dd1e6cc0c466e0d87a48ffa7.jpg\",\"00f2cbb62bd6f0a6b3a6e0091f10099a.jpg\",\"572fac304affac8c73669493f88648ec.jpg\",\"e2ad9106dff4cbef9fa84eb7a84ddb1e.jpg\"]', '<p>Tirta alami adalah nama pemandian atau kolam renang yang ada di desa pancasan. satu-satunya objek wisata yang ada di desa pancasan ini dikelola oleh pemerintah desa pancasan, dan merupakan satu-satunya kolam renang milik Pemdes di kabupaten banyumas. keunggunalan kolan renang turta alami pancasan ini memiliki air yang alami , karena bersumber dari air sumber(tuk) besar sungai Tajum. airnya ayang alami, tentu amat segar untuk renang. meski persaingan untuk objek wisata waha air makin ketat, namun tirta alami ini sudah cukup lama dikenal masyarakat luas, sehingga tetap ramai.</p><p>Tiket : Dewasa : Rp. 10000 dan  anak-anak : Rp.8000</p><p>Parkir : 2000</p><p>Jam buka : 06.00 - 16.00 WIB</p><p><br></p>', 'Pancasan, Ajibarang, 53163, Banyumas, Central Java Province, Indonesia', -7.4275, 109.0775, 'https://www.instagram.com/explore/tags/pancasantirtaalami/'),
(40, 16, 'Dreamland water park pancasan', 30000, '[\"fbfce85a514cc7da7793f11e53a795b6.jpg\",\"9a471b8634049597be9dbec7f92071e9.jpg\",\"2715f42bec988512d74ff75fc042d0fc.jpg\",\"d4adbe77eea1cb2c047bc3ea3c870fe5.jpg\"]', '<p>Tempat wisata yang menarik untuk dikunjungi bersama keluarga adalah taman air dreamland yang berada di daerah ajibarang jawa tengah. Dreamland semakin populer dengan lengkapnya wahana yang disuguhkan seperti wahana taman air, taman reptile, dan aquarium. bukan hanya wahana saja yang menarik namun memiliki bckground pemadangan alam yang menarik danmenyenangkan.</p><p>Fasilitas : </p><ul><li>Parkir luas </li><li>Toilet &amp; kamar bilas </li><li>Warung makan Penyewaan ban untuk renang </li><li>Wahana menarik Loker dll</li></ul><p>Tiket : Dewasa : Rp. 35.000 &amp; Anak-anak : Rp. 30.000</p><p>Jam Buka : 08.00 - 18.00 WIB setiap hari</p><p>Kontak : 0852-2794-2908</p>', 'Karangbawang, Ajibarang, 53163, Banyumas, Jawa Tengah, Indonesia', -7.42972, 109.06306, 'https://www.instagram.com/explore/tags/dreamlandajibarang/'),
(41, 17, 'Objek mata air umbul jumprit', 5000, '[\"66e5c7a185cf809cd303eb558318b694.jpg\",\"ab0900ba234cad9dbeff0c56548d2946.jpg\",\"1ba9893baca83b2d5ebac7c5847e01d1.jpg\",null]', '<p>Kawasan umbul jumprit merupakan suatu kawasan mata air yang terletak di lereng Gunung Sindoro degan ketinggian 2.100 mdpl. situs ini terletak sekitar 26 kilometer di sebelah barat laut kota temanggung, Mata air ini tidak pernah kering meskipun pada musim kemarau dan menjadi sumber air bagi sungai progo.</p><p>Fasilitas : Tempat ziarah ki jumprit, Pemandian mata air, Pemandangan pegunungan, Perkemahan, arena track ATV, toilet dan mushola</p><p>Tiket : 5000</p><p>Jam Buka : 08.00 - 16.00 WIB</p>', 'Purbosari, Ngadirejo, 56255, Temanggung, Central Java Province, Indonesia', -7.25556, 110.02806, 'https://www.instagram.com/explore/tags/umbuljumprit/'),
(42, 18, 'Umbul sidomukti', 5000, '[\"420ad24291a85f24557f65a218a7d60c.jpg\",\"38e6c993cf9757ba58d10c120cb2f215.jpg\",\"0d92674298b9ee2d806733a7fb2e1dc5.jpg\",\"31fcd35fa53f72c2a8635998a02c5db9.jpg\"]', '<p>Kawasan wisata umbul sidomukti merupakan salah satu wisata alam pegunungan di semarang, berada di desa sidomukti kecamatan bandungan, kabupaten semarang. kawasan wisata ini dengan diukung fasilitas &amp; servis serta meeting room.</p><p>Fasilitas : </p><ul><li>outbound training</li><li>adrenalin games</li><li>taman renang alam </li><li>camping ground</li><li>pondok wisata</li><li>pondok lesehan/restaurant </li><li>penginapan dll.</li></ul><p>Tiket retribusi : Rp. 5000, untuk arena kolam renang dan outbond : Rp. 10.000/org dan wahana outbond : Rp. 20.000/wahana</p><p>Jam buka : 08.00 - 24.00 WIB</p><p>Kontak : 0832-4214-2224</p>', 'Sidomukti, Bandungan, 50661, Semarang, Central Java Province, Indonesia', -7.21, 110.39, 'https://www.instagram.com/explore/tags/umbulsidomukti/'),
(43, 10, 'Objek wisata mata air cokro', 10500, '[\"f492bc5648b4e7de79ec20c388527a17.jpg\",\"797dc509490634f538a58a13739dc60b.jpg\",\"2fd314e90eb68abcaae36b57fe805817.jpg\",\"cc8abe1c16658f491ecbafae9e92cb01.jpg\"]', '<p>Obyek mata air cokro (OMAC) ini merupakan salah satu tempat wisata hits klaten ini benama umbul ingas. dinamai demikian karena mata air iniberada diantara pohn ingas yang berkuran besar. pohon ubu pula yang menjadi atap alami lokasi tersebut sehingga jawa sejuk dan rindang akan menemanisetiap wisatawan yang berkunjung. selain itu pohon-pohon besar yang mengelilingi obyek wisata klate ini juga merupakan salah satu alasan air diumbul ini selalu jernih </p><p>Fasilitas : Parkir luas, outbond, kamar ganti,mushola, ATV dan Mini Trail sirkuit, water slide, OMAc miracle garden</p><p>Tiket : Rp. 10.500 , untuk riverboarding mata air cokro Rp. 40.000</p><p>Jam buka : 09.00 - 17.00 WIB</p>', 'Obyek Mata Air Cokro (OMAC), Desa Cokro, Klaten, Central Java Province 57482, Indonesia', -7.603238, 110.643998, 'https://www.instagram.com/explore/tags/mataaircokro/'),
(44, 10, 'Umbul manten', 6000, '[\"5909402402ff46ea42bfa9229bd2e396.jpg\",\"32406fcaec115255f72cc58918013484.jpg\",\"\",\"\"]', '<p>Umbul manten adalah pemandian dari mata air alami yang menjadi tempat favorit bagi para pecinta foto bawah air (underwater), umbul manten juga merupakan temapt wisata berenang dengan sumber mata air alami. manum bedanya adalah diumbul manten terdapat 3 tempat rekreasi alami sekaligus bisa dijumpai oleh wisatawan dalam satu tempat. ditambah lagi lokasi umbul manten terdapat banyak pepohohan besar dan rindang. Jadi sensasi segarnya dobel, sumber mata air alami plus lokasinya yang terhindar dari paparan matahari langsung.</p><p>Fasilitas :</p><ul><li>Kamar Ganti/bilas</li><li>warung jajanan</li><li>persewaan ban.</li></ul><p>jam buka : 06.00-18.00 WIB</p>', 'Wunut, Tulung, 57482, Klaten, Central Java Province, Indonesia', -7.59, 110.65, 'https://www.instagram.com/explore/tags/umbulmanten/'),
(45, 10, 'Umbul nilo', 5000, '[\"0ead1f60947bf06a2a85355760eaa1c8.jpg\",\"a450cf7e826e02079527b01eb3655ea3.jpg\",null,null]', '<p>Disekitar wilayan tersebut terdapat sejumlah umbul (mata air) lainnya yang juga menarik untuk dikunjungi dan salah satunya adalah umbul nilo. yang memiliki kesegaran air akan terus terjada, air yang keluar dari sejumlah titik diumbul tersebut disaluran ke sungau yang ada di bawahnya</p><p>Fasilitas ; </p><ul><li>parkir</li><li>kamar ganti</li><li>warung makan</li></ul><p>Tiket : Rp. 5000</p><p>Jam buka : 08.00-18.00 WIB</p><p><br></p><p><br></p>', 'Daleman, Tulung, 57482, Klaten, Central Java Province, Indonesia', -7.59028, 110.63333, 'https://www.instagram.com/explore/tags/umbulnilo/'),
(46, 10, 'Umbul sigedhang', 5000, '[\"a1b4514ffe85bde606cd865f28e24449.jpg\",\"ec6cc6a7f565f4906051a9c6445da83c.jpg\",\"e678a56adcbd93f215998ba793602f64.jpg\",\"9dce5e18113d13da9ded624c2d657b04.jpg\"]', '<p>Umbul sigedang alte menjadi bagian tempat wisata menarik dikunjungi, tak heran kalau sekarang telah ramai dikunjungi oleh wisatawan, baik wisatawan lokal maupun datang dari luar kota. hal ini tersebut merujuk keindahan begitu mempesona hingga memberikan sensasi berbeda dari objek wisata lain. merupakan sebuha tempat pemandian memiliki sumber air alami, tentu air disana sangat jernih. namun kini umbul sigedang pun tengah menjadi perbincangan menarik di berbagai sosial media., telah banyak foto-foto beredah diunggah disosmed. hal tersebut ta terlepas dari keindahan alam, kejernihan air, susana sekitar wisata begitu asri, pepohohan rindang dan beragam ikan warna warni.</p><p>Fasilitas : </p><ul><li>kamar ganti/toilet</li><li>warung makan</li><li> mushola</li><li>parkir</li><li> tempat istirahat</li></ul><p>Tiket : Rp. 5000</p><p>Jam buka : 07.00 - 17.00 WIB</p><p>Kontak : 0812-2654-661</p><p><br></p><p><br></p>', 'Polanharjo, 57474, Klaten, Central Java Province, Indonesia', -7.59611, 110.66333, 'https://www.instagram.com/explore/tags/umbulsigedang/'),
(47, 19, 'Obyek tok ngudal lanang', 0, '[\"709c716d664d79610064fb09a02835a6.jpg\",\"feb7d317c8d78f68d12bb0bf0a89c61d.jpg\",\"9b0e007370f067a028e2ea2e9de346c0.jpg\",\"1f85c24d695ed7ddcc0abdc042e2ce01.jpg\"]', '<p>Pemandian Tuk ngudal lanang tertetak di desa tampir kulon, kecamatan candimulyo magelang. disini terdapat dua umbul yang memiliki air sebening kaca, satu bernama tuk ngudal lanag dan satunya bersanama tuk ngudal wadon. lokasinya besebelahan jadi tak perlu berjalan jauh. tuk ngudal laang masih terbilang sepi dan berlum ditetapkan sebagai tempat wisata.</p><p>Fasilitas : </p><ul><li>Tempat ganti</li></ul><p>Buka : 24 Jam</p><p><br></p><p><br></p><p><br></p>', 'Tampir Kulon, Candimulyo, 56191, Magelang, Jawa Tengah, Indonesia', -7.53, 110.25, 'https://www.instagram.com/explore/tags/tokngudallanang/'),
(48, 0, 'Obyek sendang mudal', 2000, '[\"b61917ab4fde07f0adbb0da6df1a4f08.jpg\",\"2ff4bd2cdb22e8497888a3ff148b83a5.jpg\",\"2e2096cd3647711dbcc78f3fb47f0302.jpg\",\"bc1e9b7deafc06dffc5f0881595b86e6.jpg\"]', '<p>Sendang mudal sawangan magelang merupakan salah satu objek wisata alam alami jernih serta bawah kolam yang berupa pasir layaknya dilaut. jernihnya kolan dan segarnya air yang berasal dari sumber alami serta suasana persawahan disekitar lokasi, membuat kegiatan bermain air senda ini begitu menyenangkan,</p><p>Fasilitas : Toilet, warung makan, tempat teduh, mushola ,dan parkir</p><p>Jam buka : 07.00 - 17.00 WIB</p>', 'Sawangan, 56481, Magelang, Central Java Province, Indonesia', -7.49472, 110.36917, ' https://www.instagram.com/explore/tags/sendangmudal/'),
(49, 20, 'Obyek wisata air senjoyo tingkir', 0, '[\"49ccfe467a29dcc5072d105897008d1a.jpg\",\"a139b4092e94f2355c8b248459d6ad25.jpg\",\"06659d6a013fb44fd026079f6d9f60ea.jpg\",\"09c3f76149c66a0ff34d4428d9d0ce6e.jpg\"]', '<p>Obyek wisata mata air senjoyo tingkir ini memiliki pesona keindahan yang sangat menarik untuk dikunjungi. sumber mata air ini letaknya dikabupaten semarang dan dekat dengan salatiga. disini wisatawan dapat bermain air dan seru sekali, karena memiliki keindahan mata air yang jernih sehingga menjadi daya tarik tersendiri ditempat wisata ini dan tidak pernah sepi pengunjung yang berdatang ketempat wisata ini.</p><p>Fasilitas : </p><ul><li>Area parkir kendaraan m</li><li>mushola</li><li>kamar mandi dan masih banyak lainnya.</li></ul><p>Tiket : Free</p><p>Jam buka : 24 Jam</p><p>Kontak : 0895-1517-1875</p><p><br></p><p><br></p>', 'Tingkir, 50742, Salatiga, Central Java Province, Indonesia', -7.33083, 110.50861, 'https://www.instagram.com/explore/tags/senjoyosalatiga/'),
(50, 21, 'Wisata owabong', 25000, '[\"611dc7548f28791aecdbb0a51a2ae623.jpg\",\"5593225512676db280606fed647c24b0.jpg\",\"145ef7d4915781c824987826ee5b0667.jpg\",\"d509c387e529a5a9e147983de6c58d57.jpg\"]', '<p>Wisata owabong ini berada didataran tinggi yang berdekatan dengan gunung slamet, shingga suasana sejuk dan nyaman akan terasa saat berenang di 13 kolam berisikan air asli dari 7 mata air disekitarnya. untuk emmanjakan wisatawan, PD owabong melebarkn sayap usaha dengna menyediakan cottage degan fasilitas dan pelayanan hotel berbintang dll.</p><p>Fasilitas :</p><ul><li>Mushola</li><li>tempat parkir sangat luat</li><li>Resto &amp; foodcourt</li><li>kamar mandi</li><li>tribune istirahat cukup luas</li><li>pusat jajanan</li><li>outbond &amp; wahana air</li><li>coffeshop</li></ul><p>Tiket : Rp. 25.000 (weekdays) Rp. 30.000 (weekend)</p><p>Jam buka : 06.00 - 18.00 WIB</p><p>Kontak : 0858-9999-6967</p><p><br></p><p><br></p><p>.</p>', 'Owabong Waterpark, Jalan Owabong No. 1, Purbalingga, Central Java Province 53362, Indonesia', -7.348985, 109.349406, 'https://www.instagram.com/explore/tags/owabong/'),
(52, 10, 'Umbul Ponggok', 15000, '[\"96754ebe944325a0c5ad20ef4a4e5b5d.jpg\",\"87b630161abef2004a9868c8a909d659.jpg\",\"a63151cdbce8f0039eb111cef133a87b.jpg\",\"90fd97ec32cc16ddd41bb429ae087432.jpg\"]', '<p>Tentang :</p><p>Tidak sedikit pengunjung yang menjuluki umbul ponggok dengan sebutan bunaken van klaten. Ada nilai lebih dari tempat wisata umbul ponggok yang tidak dimiliki oleh tempat-tempat snorkeling yang lain, yaitu lokasinya yang berada di perairan darat alias masih memanfaatkan sumber mata air. Dengan memiliki berbagai macam spot underwater yang digemari terutama oleh anak-anak muda&nbsp;yang gemar memamerkan foto-foto dan gambar video dengan background yang unik dan menarik diberbagai media sosial, seperti facebook, instagram , youtube, dll.</p><p>Fasilitas : </p><ul><li>Parkir Luas</li><li>Kamar bilas &amp; toilet</li><li>tempat beribadah</li><li>restaurant</li><li>warung makan</li><li>Layanan persewaan kamera underwater</li><li>alat snorkling &amp; diving.&nbsp;</li></ul><p>Tiket Masuk : Hari Biasa dan weekend IDR 15.000</p><p>Jam Buka : senin – jumat (08.00 WIB -16.00 WIB) sabtu-minggu (07.00 WIB-17.00 WIB)</p><p>Kontak : 0823-1438-8880</p>', 'Umbul Ponggok, Ponggok, Klaten, Central Java Province 57475, Indonesia', -7.613906, 110.635956, 'https://www.instagram.com/explore/tags/umbulponggok/'),
(53, 22, 'Obyek Krakal Alian', 4000, '[\"92c79b0d38463f750d94bc32a544fd4f.jpg\",\"c65693d1dbbd2544f805df24d52395bd.jpg\",\"fc9cce30267df2e24527e71cf322ffb5.jpg\",\"75449e47287f1270b0dd01c0b05ae071.jpg\"]', '<p>Krakal Alian ini merupakan pemandian air panas berasal dari sumber mata air panas alami yang tidak pernah kering sepanjang tahun. Terdapat beberapa mata air panas namun hanya 2 mata air yang digunakan untuk pemandian air panas. Kandungan garam mineral yang terkandung cukup tinggi sehingga dapat menyehatkan tubuh.</p><p>Lokasi : Desa Krakal, Kecamatan Alian, Kabupaten Kebumen, Jawa Tengah, Indonesia.</p><p>Fasilitas : </p><ul><li>Area parkir kendaraan</li><li>tempat istirahat</li><li>kamar mandi/MCK</li><li>warung makan, dll.</li></ul><p>Tiket Masuk : Rp. 4000 – Rp. 8000</p><p><br></p>', 'Krakal, Alian, 54352, Kebumen, Central Java Province, Indonesia', -7.60528, 109.70139, 'https://www.instagram.com/explore/tags/krakalalian/'),
(54, 19, 'Obyek mata air ndas gending', 2000, '[\"bf726488daded8be085b2eab4fbcb7ab.jpg\",\"df058a3f0c10f6beaeb75cff5228cfc4.jpg\",\"68e67c3efda8f82674cff9ca929d408d.jpg\",\"8d6bb42a901a1316fdfd997f50c3a11d.jpg\"]', '<p>Tempat wisata ini merupakan tempat pemandian dari sumber air alami yang telah dimanfaatkan oleh banyak penduduk atau untuk kebutuhan sehari-hari nya. Air nya yang sangat jernih dan segar bisa untuk berenang dan berendam juga membuat masyarakat sekitar tidak ragu untuk&nbsp;menjadikan kebutuhan sehari-hari.</p><p>Lokasi : Ganjuran, Sukorejo, Mertoyudan, Magelang, Central Java 56172</p><p>Fasilitas : </p><ul><li>Mushola</li><li>tempat parkir</li><li>kamar ganti</li><li>ayunan bermain</li></ul><p>Tiket Masuk : hanya biaya parkir kendaraan 3000</p><p>Jam Buka : 24 Jam</p><p><br></p>', 'Sukorejo, Mertoyudan, 56172, Magelang, Jawa Tengah, Indonesia', -7.53639, 110.19972, 'https://www.instagram.com/explore/tags/wisatandasgendhing/'),
(55, 19, 'Sendang maren', 2000, '[\"28449b4c204fab72115bc3f3ec00cfa2.jpg\",\"ebacb149780fb4f7cbd8c78e1984bd90.jpg\",\"29d794d03a1ee437e1ac9361bbca1046.jpg\",\"21e65ee8621a3c6da823115bc4a83daa.jpg\"]', '<p>Wisata sendang maren tempat wisata pemandian umum memiliki air yang jernih sehingga dapat menyegarkan hati dan rasanya ingin langsung nyebur saja. Disini juga kita dapat berselfi dibawah air yang jernih. Disarankan untuk datang kesini dipagi hari, karena dapat merasakan kesegeran langsung air di wisata sendang maren ini.</p><p>Lokasi : Butuh Kulon, Sawangan, Magelang, Central Java 56481</p><p>Fasilitas : </p><ul><li>Area Parkir Motor</li><li>Kamar Ganti</li><li>Warung</li></ul><p>belum ada tiket masuk dan tidak ada parkiran,jadi jika kamu kesini motor atau mobil bisa kamu titipkan ke warga setempat.</p><p>Tiket Masuk : Gratis	</p><p>Jam Buka : 07.00 – 17.00</p><p><br></p>', 'Butuh, Sawangan, 56481, Magelang, Jawa Tengah, Indonesia', -7.53, 110.31, 'https://www.instagram.com/explore/tags/sendangmaren/'),
(56, 19, 'Wisata candi umbul telomoyo', 5000, '[\"cb14969cb5460f82e20a6828ee701258.jpg\",\"3e951b87fb6ff13825dbe348d03f87f3.jpg\",\"0177e18cb0d174e20810bb313c1015d2.jpg\",null]', '<p>Wisata Candi umbul merupakan pemandian yang berasal dari peninggalan kerajaan mataran kuno. Pemandangan disekitar kolam ukiran bebatuan yang menambah suasana sejarah yang kental. Dikolam ini memiliki pemandian dengan air yang cukup hangat. Warna air nya pun cukup jernih dengan sedikit hijau-hijauan akibat tumbuhan lumut yang berada di dasar kolam</p><p>Lokasi : Jalan Candi Umbul, Grabag, Perkebunan, Kartoharjo, Kec. Grabag, Magelang, Jawa Tengah 56196</p><p>Fasilitas : </p><ul><li>Parkir</li><li>Tempat ganti</li><li>Toilet</li><li> Warung makanan</li></ul><p>Tiket Masuk : Rp. 4.500 – Rp. 7.000</p><p>Jam Buka : 06.00 – 18.00</p><p>Kontak : 0877-3414-3050</p><p><br></p>', 'Grabag, 56196, Magelang, Central Java Province, Indonesia', -7.40556, 110.30778, 'https://www.instagram.com/explore/tags/candiumbul/'),
(57, 21, 'Wisata Tirta Situ Marta', 5000, '[\"bd6a8a275bdddffcad31164a4dde09e6.jpg\",\"1f31ea0618fa7be33b554c4485c98825.jpg\",\"31afc56e3ade03582a507c3e0709343e.jpg\",null]', '<p>Wisata Pemandian Situ Tirta Marta di Kutasari Purbalingga Jawa Tengah memiliki pesona keindahan yang sangat menarik untuk dikunjungi. Wisata Situ Tirta marta memiliki sumber air alami yang terletak di desa karangcegak, kab.purbalingga. bukan hanya alami saja, wisata tirta marta ini memiliki air yang jernih dan bening hingga dasar. Dikelilingi pohon yang rindang sehingga membuat suasana di tempat wisata ini menjadi menyegarkan. Terdapat wisata spot wisata foto didalam air dan snorkeling.</p><p>Lokasi : Dusun 1, Karangcegak, Kutasari, Purbalingga Regency, Central Java 53361</p><p>Fasilitas : </p><ul><li>Area Parkir</li><li>Toilet</li><li>Warung makan</li><li>Mushola</li><li>Tempat Istirahat</li><li>Wahana outbond/flying fox</li><li>sewa operator dan kamera.</li></ul><p>Tiket Masuk : Rp5.000</p><p>Jam Buka : 08.00-17.00 WIB.</p><p><br></p>', 'Karangcegak, Kutasari, 53361, Purbalingga, Central Java Province, Indonesia', -7.32194, 109.28944, 'https://www.instagram.com/explore/tags/situtirtamarta/	'),
(58, 10, 'Wisata Umbul Gedaren', 2000, '[\"c1332e83aba02c14871ec64c0459518d.JPG\",\"f0596eeb98d3270c2dfdfbb8e63c7a9e.jpg\",\"7ce879aba522cfeac30fe6755764074d.jpg\",null]', '<p>Wisata Umbul Gedaren biasa air umbul itu dipercaya bisa untuk terapi penyembuhan beberapa jeni penyakit. Dimanfaatkan sebagai terapi untuk pengobatan gejala sakit stroke atau penyakit syaraf lainya.</p><p>Lokasi : Jl. Klaten - Jatinom No.7, Gedaren, Kec. Jatinom, Kabupaten Klaten, Jawa Tengah 57481</p><p>Fasilitas : </p><ul><li>Area Parkir</li><li>Toilet</li></ul><p>Tiket Masuk : hanya biaya parkir 2000</p><p>Jam Buka : 24 jam</p><p><br></p>', 'Gedaren, Jatinom, 57481, Klaten, Central Java Province, Indonesia', -7.64806, 110.59389, 'https://www.instagram.com/explore/tags/umbulgedaren/'),
(59, 10, 'Wisata Umbul pluneng tirtomulyani', 2000, '[\"e707f3aaf58a09f02b10f429c84cf67f.JPG\",\"a843ae19ea9f22aa7c02f44c13ff3f31.jpg\",\"c8f9c27becda4135178dcf3006e1502e.jpg\",null]', '<p>Wisata Umbul Pluneng merupakan tempat mandi di pemandian yang memperoleh kesenangan dan kenyamanan. Menurut warga sekitar pluneng berasal dari Plung (nyemplung) dan Neng (Seneng). Di tempat wisata ini terbagi menjadi dua kolam, yang pertama digunakan untuk mandi, berenang dan bermain-main air, yang kedua yaitu digunakan warga sekitar untuk mencuci bagi warga sekitar. Dipemandian ini terdapaat arca-arca dari peninggalan sejarah.&nbsp;</p><p>Lokasi : Karanglor, Karang, Pluneng, Kec. Kebonarum, Kabupaten Klaten, Jawa Tengah 57486</p><p>Fasilitas : </p><ul><li>Area Parkir</li><li>Toilet/MCK</li><li>Sewa Pelampung</li><li>Warung Makanan</li></ul><p>Tiket Masuk : Rp. 2000</p><p>Jam Buka : 07.00-17.00 WIB</p><p>Kontak : 0822-3128-3138</p><p><br></p>', 'Pluneng, Kebonarum, 57486, Klaten, Central Java Province, Indonesia', -7.6958, 110.5656, 'https://www.instagram.com/explore/tags/umbulpluneng/'),
(60, 19, 'Wisata mata air telogo sari', 3000, '[\"cbadeabb8eb20194c19c6f713efff520.jpg\",\"391dac4e6adee2fa110beb953da2e816.jpg\",\"cd70470a143a290d3b001ab56631a60a.jpg\",\"4fdb3e69104452ebd77dfaaff728d502.jpg\"]', '<p>Wisata mata air telogo sari ini menawaran kesegaran disebuah kolam sumber air, dimana airnya berasal dari air sumber alami yang sangat jernih dan menyegarkan. Wisata ini belum begitu populer, karena memang belum terekspose media. Kini kolam renang ini juga dilengkapi dengan papan yang bertulis kan “Telogo Sari”. Jadi, bisa dijadikan spot foto yang bagus.</p><p>Lokasi : Ponggolan, Citrosono, Kec. Grabag, Magelang, Jawa Tengah 56196</p><p>Fasilitas : </p><ul><li>kamar ganti</li><li>parkir</li></ul><p>Tiket Masuk : Biaya parkir swadaya warga</p><p>Jam Buka : 07.00 - 17.00 WIB</p><p><br></p>', 'Citrosono, Grabag, 56196, Magelang, Central Java Province, Indonesia', -7.35472, 110.35028, 'https://www.instagram.com/explore/tags/telogosari/'),
(61, 24, 'Sonosewu Water Springs', 1000, '[\"b10aa39b21384269666efe353d024c29.png\",null,null,null]', '<p>contoh</p>', 'Universitas PGRI Yogyakarta, Jl. Sonosewu, Bantul, Special Region of Yogyakarta 55182, Indonesia', -7.806311, 110.341043, 'https://www.instagram.com/explore/tags/umbulponggok/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_destinasi`
--
ALTER TABLE `tb_destinasi`
  ADD PRIMARY KEY (`id_destinasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_penginapan`
--
ALTER TABLE `tb_penginapan`
  ADD PRIMARY KEY (`id_penginapan`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `id_wisata` (`id_wisata`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_destinasi`
--
ALTER TABLE `tb_destinasi`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_penginapan`
--
ALTER TABLE `tb_penginapan`
  MODIFY `id_penginapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_destinasi`
--
ALTER TABLE `tb_destinasi`
  ADD CONSTRAINT `tb_destinasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
