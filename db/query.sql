DROP VIEW dat_obat

CREATE VIEW dat_obat AS
SELECT `kode`,`nama`,`suplierid`,`kategori`,`satuan`,`beli`,`jual`,`expired`,`stok` 
FROM tb_obat
WHERE STATUS='aktif'



CREATE VIEW data_obat AS
SELECT `kode`,`nama`,`suplierid`,`kategori`,`satuan`,`beli`,`jual`,`expired`,`stok` 
FROM tb_obat

SELECT * FROM data_obat


UPDATE tb_obat SET STATUS='aktif'



CREATE VIEW expire AS
SELECT
  `tb_obat`.`kode`              AS `kode`,
  `tb_obat`.`merk`              AS `merk`,
  `tb_obat`.`nama`              AS `nama`,
  `tb_obat`.`suplierid`         AS `suplierid`,
  `tb_obat`.`kategori`          AS `kategori`,
  `tb_obat`.`satuan`            AS `satuan`,
  `tb_obat`.`beli`              AS `beli`,
  `tb_obat`.`jual`              AS `jual`,
  `tb_obat`.`expired`           AS `expired`,
  `tb_obat`.`stok`              AS `stok`,
  `tb_obat`.`status`            AS `STATUS`,
  `tb_obat`.`edit`              AS `edit`,
  
  (TO_DAYS(CURDATE()) - TO_DAYS(`db_apotek`.`tb_obat`.`expired`)) AS `selisih`,
  CURDATE()                     AS `tgl_sekarang`
FROM `tb_obat` WHERE STATUS='aktif'

DROP VIEW expire

SELECT * FROM expire


SELECT tb_obat.nama, COUNT(qty), SUM(subtotal) FROM tb_obat, detail, penjualan WHERE tb_obat.kode = detail.`kode_obat` AND detail.id=penjualan.id 
AND tgl= '2019-01-31' GROUP BY tb_obat.`nama`;


SELECT MONTH(tgl) AS bulan, SUM(total_harga) AS tota_penjualan
FROM penjualan
GROUP BY MONTH(tgl)


SELECT YEAR(tgl) ,MONTH(tgl) FROM penjualan WHERE   GROUP BY MONTH(tgl)






SELECT MONTH(tgl) AS tahun_bulan, COUNT(*) AS jumlah_bulanan, SUM(total_harga)
FROM  penjualan WHERE kasir='bone'AND tgl LIKE '%2020%'
GROUP BY MONTH(tgl);


SELECT SUM(total_harga) AS total FROM penjualan WHERE tgl=CURDATE()
`penjualan`
SELECT DATE_FORMAT(CURDATE(tgl),"%m") FROM penjualan

SELECT SUM(total_harga) AS total FROM penjualan GROUP BY MONTH(tgl);



SELECT CONCAT(YEAR(tgl),'/',MONTH(tgl)) AS tahun_bulan, SUM(total_harga) AS total
FROM penjualan
WHERE CONCAT(YEAR(tgl),'/',MONTH(tgl))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
GROUP BY YEAR(tgl),MONTH(tgl);


UPDATE suplier
SET 
  nama = 'nama',
  kota = 'kota',
  telp = 'telp',
  email = 'email',
  alamat = 'alamat'
WHERE kode = 'kode';






SELECT MONTH(tgl) AS bulan, SUM(total_harga) FROM  penjualan WHERE kasir='bone' AND tgl LIKE '%2019%' GROUP BY MONTH(tgl);


SELECT SUM(total_harga) AS penjualan FROM  penjualan WHERE MONTH(tgl) = '04' AND YEAR(tgl)='2019'




SELECT * FROM expire ORDER BY selisih ASC


SELECT COUNT(kode) AS total FROM tb_obat WHERE MONTH(expired) = '04' AND YEAR(expired)='2019'




UPDATE data_apotek SET `nama` = 'nama',`alamat` = 'alamat',`telp` = 'telp',`so` = 'so',`info` = 'info'



SELECT CONCAT(YEAR(tgl),'/',MONTH(tgl)) AS tahun_bulan, SUM(total_harga) AS total FROM penjualan 
WHERE CONCAT(YEAR(tgl),'/',MONTH(tgl))=CONCAT(YEAR(NOW()),'/',MONTH(NOW())) GROUP BY YEAR(tgl),MONTH(tgl)


SELECT SUM(total_harga) FROM penjualan WHERE tgl BETWEEN '2019-04-01' AND '2019-04-31'



SELECT MONTH(NOW())