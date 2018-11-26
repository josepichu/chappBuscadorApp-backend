SELECT h3_.id 
FROM reservas r4_ 
INNER JOIN habitaciones h3_ ON r4_.habitacion_id = h3_.id 
INNER JOIN hoteles h5_ ON h3_.hotel_id = h5_.id 
WHERE (

(r4_.fecha_entrada < '2019-01-01' AND r4_.fecha_salida > '2019-01-02') OR 

(r4_.fecha_entrada < '2019-01-02' AND r4_.fecha_salida > '2019-01-02') OR 

('2019-01-01' BETWEEN r4_.fecha_entrada AND r4_.fecha_salida AND '2019-01-02' BETWEEN r4_.fecha_entrada AND r4_.fecha_salida) OR 

(r4_.fecha_entrada < '2019-01-01' AND r4_.fecha_salida > '2019-01-02')

)