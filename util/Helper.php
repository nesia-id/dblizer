<?php

namespace Util;


class Helper
{
    private static $patient_status = [
        1 => 'Survivor Bebas Tumor',
        'Survivor Residif Lokal',
        'Survivor Dengan Metastasis',
        'Meninggal',
    ];

    private static $treatment = [
        1 =>  'Tidak Pernah',
        'Dukun',
        'Herbal',
        'Obat Sendiri',
        'Alternatif',
    ];

    private static $complaint = [
        1 =>  'Benjolan',
        'Borok',
        'Sesak',
        'Nyeri Tulang',
        'Fraktur',
        'Cc',
        'Limfedema',
        'Bloody Discharge',
        'Ikterik',
        'Sefalgia',
    ];

    private static $education = [
        1 =>   'NA',
        'Belum tamat SD/Sederajat',
        'Tamat SD/Sederajat',
        'SLTP/Sederajat',
        'SLTA/Sederajat',
        'Diploma I/II',
        'Akademi/Diploma III/Sarjana Muda',
        'Diploma IV/Strata I',
        'Strata II',
        'Strata III',
    ];

    private static $job = [
        1 =>   'Belum/Tidak Bekerja',
        'Mengurus Rumah Tangga',
        'Pelajar/Mahasiswa',
        'Pensiunan',
        'Pegawai Negeri Sipil (PNS)',
        'Tentara Nasional Indonesia (TNI)',
        'Kepolisian RI (POLRI)',
        'Perdagangan',
        'Petani/Pekebun',
        'Peternak',
        'Nelayan/Perikanan',
        'Industri',
        'Konstruksi',
        'Transportasi',
        'Karyawan Swasta',
        'Karyawan BUMN',
        'Karyawan BUMD',
        'Karyawan Honorer',
        'Buruh Harian Lepas',
        'Buruh Tani/Perkebunan',
        'Buruh Nelayan/Perikanan',
        'Buruh Peternakan',
        'Pembantu Rumah Tangga',
        'Tukang Cukur',
        'Tukang Listrik',
        'Tukang Batu',
        'Tukang Kayu',
        'Tukang Sol Sepatu',
        'Tukang Las/Pandai Besi',
        'Tukang Jahit',
        'Tukang Gigi',
        'Penata Rias',
        'Penata Busana',
        'Penata Rambut',
        'Mekanik',
        'Seniman',
        'Tabib',
        'Paraji',
        'Perancang Busana',
        'Penterjemah',
        'Imam Masjid',
        'Pendeta',
        'Pasior',
        'Wartawan',
        'Ustadz/Mubaligh',
        'Juru Masak',
        'Promotor Acara',
        'Anggota DPR-RI',
        'Anggota DPD',
        'Anggota BPK',
        'Presiden',
        'Wakil Presiden',
        'Anggota Mahkamah Konstitusi',
        'Anggota Kabinet/Kementrian',
        'Duta Besar',
        'Gubernur',
        'Bupati',
        'Wakil Bupati',
        'Walikota',
        'Wakil Walikota',
        'Anggota DPRD Prop.',
        'Anggota DPRD Kab. Kota',
        'Dosen',
        'Guru',
        'Pilot',
        'Pengacara',
        'Notaris',
        'Arsitek',
        'Akuntan',
        'Konsultan',
        'Dokter',
        'Bidan',
        'Perawat',
        'Apoteker',
        'Psikiater/Psikologi',
        'Penyiar Televisi',
        'Penyiar Radio',
        'Pelaut',
        'Peneliti',
        'Sopir',
        'Paranormal',
        'Pedagang',
        'Perangkat Desa',
        'Kepala Desa',
        'Biarawati',
        'Wiraswasta',
        'Lainnya',
    ];

    private static $dependant = [
        1 =>  'BPJS',
        'Umum',
        'Asuransi',
    ];

    private static $spouse_status = [
        1 =>  'Suami',
        'Istri',
    ];

    private static $kb_hormonal = [
        1 =>  'Nil',
        'Suntik',
        'Pil',
        'Susuk',
    ];

    private static $hrt = [
        1 =>  'Tidak',
        'Esterogen',
        'Progestin',
        'Kombinasi',
    ];

    private static $exercise = [
        1 =>  'Nil',
        '1-2 kali seminggu',
        '3 kali atau lebih seminggu',
    ];

    private static $smoke = [
        1 =>   'Tidak',
        'Aktif',
        'Pasif',
        'Aktif dan Pasif'
    ];

    private static $drink = [
        1 =>  'Tidak',
        'Ya',
    ];

    private static $lifestyle_range = [
        1 =>  'Nil',
        'Jarang',
        'Sering',
    ];

    private static $komorbid = [
        1 =>   'Hipertensi',
        'Dylipidemia',
        'Penyakit Diabetes',
        'Penyakit Tiroid',
        'Penyakit Metabolik',
        'Penyakit Lainnya',
    ];

    // private static $kgb = [
    //     1 =>  'Negatif',
    //     'Ax',
    //     'Ax. Fixed',
    //     'Ax. Kong',
    //     'Sup. Klav',
    //     'M. Interna',
    // ];

    private static $kgb = [
        1 =>  'Negatif',
        'Mamae',
        'KGB Axila',
        'KGB Supraklavikula',
        'KGB Leher',
        'Kulit',
    ];

    private static $kgb_options = [
        1 =>  'Negatif',
        'Membesar',
        'Fixed',
        'Konglomerasi',
    ];

    private static $kgb_interna = [
        1 =>  'Negatif (-)',
        'Positif (+)',
    ];

    private static $metastatis = [
        1 =>  'Nil',
        'Paru',
        'Tulang',
        'Hati',
        'Otak',
        'Lainnya',
    ];

    private static $pages = [
        1 => 'Identitas Pasient',
        'Faktor Risiko',
        'Pemeriksaan',
        'Pencitraan/Pathology',
        'Pengobatan Lokoregional',
        'Terapi Sistemik',
        'Tumor Marker',
        'Catatan Penting',
        'Outcome Pengobatan'
    ];

    private static $paginations = [
        1 => 15,
        25,
        50
    ];

    private static $therapy_response = [
        1 => 'Kemoterapi',
        'Terapi Hormonal',
        'Terapi Target',
        'Lainnya'
    ];

    private static $long_unit = [
        1 => 'Tidak Diketahui',
        'Saat Pemeriksaan',
        'Hari',
        'Minggu',
        'Bulan',
        'Tahun'
    ];

    private static $imaging_type = [
        'Mamografi',
        'USG Mamae',
        'Foto Thoraks',
        'USG Abdomen',
        'Bone Scan',
        'CT Scan',
        'FNAB/Core',
        'Histopatologi',
        'IHK',
        'FNAB',
        'Core'
    ];

    public static function all($name, $object = true)
    {
        if (isset(self::${$name})) {
            $result = [];
            foreach (self::${$name} as $key => $value) {
                array_push($result, $object ? (object) [
                    'id' => $key,
                    'name' => $value
                ] :
                    [
                        'id' => $key,
                        'name' => $value
                    ]);
            }

            return $object ? (object) $result : $result;
        } else {
            return null;
        }
    }

    public static function arrayOf($name)
    {
        if (isset(self::${$name})) {
            return self::${$name};
        } else {
            return [];
        }
    }

    public static function relation($name, $value, $object = true, $default = null)
    {
        if (isset(self::${$name})) {
            $result = [
                'id' => $value,
                'name' => self::${$name}[$value]
            ];
            return $object ? (object) $result : $result;
        } else {
            return $default;
        }
    }

    public static function relationByName($name, $valueName, $object = true, $default = null)
    {
        if (isset(self::${$name})) {
            $value = array_search($valueName, self::$imaging_type);
            $result = [
                'id' => $value,
                'name' => self::${$name}[$value]
            ];
            return $object ? (object) $result : $result;
        } else {
            return $default;
        }
    }
}
