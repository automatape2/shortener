## 1. Generación de URLs cortas (Short URL Generation)
### a. Generación correcta de la URL corta
Descripción: Verificar que una URL larga sea correctamente convertida a una URL corta.
Datos de entrada: URL larga válida (e.g. http:/`/example.com/very-long-url).
Resultado esperado: Una URL corta válida (e.g. http://short.ly/abc123).
### b. Generación única de URL corta
Descripción: Asegurarse de que diferentes URLs largas generen diferentes URLs cortas.
Datos de entrada: Varias URLs largas (e.g. http://example.com/page1 y http://example.com/page2).
Resultado esperado: Cada URL larga debe generar una URL corta única.
### c. Manejo de URLs repetidas
Descripción: Asegurarse de que la misma URL larga genere la misma URL corta (si es parte del requerimiento).
Datos de entrada: La misma URL larga ingresada varias veces (e.g. http://example.com/repeat).
Resultado esperado: La misma URL corta debe generarse en cada intento.
## 2. Expansión de URLs (URL Expansion)
### a. Expansión correcta de una URL corta
Descripción: Verificar que una URL corta se expanda correctamente a la URL larga original.
Datos de entrada: URL corta válida (e.g. http://short.ly/abc123).
Resultado esperado: La URL larga correspondiente (e.g. http://example.com/very-long-url).
### b. Manejo de URLs no existentes
Descripción: Asegurarse de que el sistema maneje correctamente las URLs cortas no existentes.
Datos de entrada: URL corta inválida o inexistente.
Resultado esperado: Un mensaje de error adecuado (e.g. "URL no encontrada" o código de error 404).
## 3. Validación de URLs
### a. URL larga inválida
Descripción: Probar el comportamiento del sistema cuando se introduce una URL larga inválida.
Datos de entrada: Una URL malformada (e.g. htp://invalid-url).
Resultado esperado: El sistema debería rechazar la URL con un mensaje de error.
## 4. Casos de prueba de límite
### a. URL extremadamente larga
Descripción: Probar el comportamiento del sistema con una URL que exceda los límites esperados.
Datos de entrada: Una URL extremadamente larga (más de 2000 caracteres).
Resultado esperado: El sistema debería manejarla o dar un mensaje de error adecuado.
### b. URL vacía
Descripción: Verificar el comportamiento del sistema al intentar acortar una URL vacía.
Datos de entrada: URL vacía ("").
Resultado esperado: Un mensaje de error indicando que la URL no puede estar vacía.
## 5. Redirección
### a. Redirección correcta de una URL corta
Descripción: Probar que al visitar una URL corta, el usuario sea correctamente redirigido a la URL larga.
Datos de entrada: URL corta válida (e.g. http://short.ly/abc123).
Resultado esperado: El usuario debe ser redirigido a la URL larga correspondiente.
