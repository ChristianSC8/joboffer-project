<?php
session_start();
include_once("../../../layouts/head.php");
include_once("../app/app.header.php");
?>

<div class="bg-white">
    <div class="flex flex-col items-center justify-center" style="height: calc( 100vh - 77px)">
        <div class="max-h-auto mx-auto max-w-xl w-[350px]">
            <p class=" text-center font-bold text-3xl">Crear cuenta</p>
            <form class="w-full mt-5" method="POST" action="../../services/auth-service/signup.service.php">
                <ul class="grid w-full gap-6 md:grid-cols-2">
                    <li>
                        <input type="radio" id="hosting-small" name="role" value="3" class="hidden peer" required />
                        <label for="hosting-small" class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-200 dark:peer-checked:text-indigo-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-100 gap-3">
                            <ion-icon name="person-outline" class="text-xl"></ion-icon>
                            <span class="mr-2">Postulante</span>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="hosting-big" name="role" value="2" class="hidden peer">
                        <label for="hosting-big" class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border border-gray-100 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-200 dark:peer-checked:text-indigo-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400  dark:hover:bg-gray-100 gap-3">
                            <ion-icon name="podium-outline"></ion-icon>
                            <span class="mr-2">Empresa</span>
                        </label>
                    </li>
                </ul>

                <div class="flex justify-evenly space-x-1 w-full mt-4 mb-4">
                    <span class="bg-gray-100 h-px flex-grow t-2 relative top-2"></span>
                </div>
                <div class="mb-10 space-y-3">
                    <div class="space-y-1">
                        <div class="space-y-2">
                            <label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="email">Nombre</label>
                            <input class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="username" placeholder="Juan perez" name="username" />
                        </div>
                    </div>
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
                    <button class="ring-offset-background focus-visible:ring-ring flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-indigo-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 " type="submit" name="signup" id="btn-resiter">Crear cuenta</button>
                </div>
            </form>
            <div class="text-center"> Tienes cuenta? <a class="text-indigo-600" href="#">Acceder</a> </div>
        </div>
    </div>
</div>