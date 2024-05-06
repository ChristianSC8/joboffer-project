<?php
include_once("../../../layouts/head.php");
include_once("../app/app.header.php");
?>


<div class="bg-white">
    <div class="flex flex-col items-center justify-center" style="height: calc( 100vh - 77px)">
        <div class="max-h-auto mx-auto max-w-xl w-[350px]">
                <p class=" text-center font-bold text-3xl" >Acceder</p>
            <form class="w-full mt-5" method="POST" action="../../services/auth-service/login-service.php">
                <div class="mb-10 space-y-3"> 
                    <div class="space-y-1">
                        <div class="space-y-2">
                            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="email">Correo</label>
                            <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="email" placeholder="mail@example.com" name="email" />
                        </div>
                    </div>
                    <div class="space-y-1">
                        <div class="space-y-2 mb-6">
                            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="password">Contraseña</label>
                            <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="password" name="password" type="password" />
                        </div>
                    </div>
                    <button class="ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-indigo-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 " type="submit" name="login">Acceder</button>
                </div>
            </form>
            <div class="text-center"> No tienes cuenta? <a class="text-indigo-600" href="#">Crear cuenta</a> </div>
        </div>
    </div>
</div>