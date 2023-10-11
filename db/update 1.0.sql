CREATE VIEW data_exp AS
SELECT *, CURRENT_DATE() AS sekarang, DATEDIFF(CURRENT_DATE(), expired) AS selisih
FROM tb_obat
WHERE STATUS='aktif'

SELECT kode,nama, COUNT(nama) duplikat FROM tb_obat GROUP BY nama HAVING COUNT(duplikat)>1
