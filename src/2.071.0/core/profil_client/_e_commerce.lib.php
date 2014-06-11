<?php

//	Ceci est une librairie.
//
//	Elle se materialise sous forme de classe pour plusieurs raisons :
//		- pour d�limiter une nom de dommaine
//		- pour pouvoir avoir des d�finir des fonctions communes � tous les e-commerces
//			et d'autres sp�cifiques � un seul.
//		- de cette mani�re, nous pouvons aussi 'masquer' les fonctions dans les sous classe
//			(c'est une sorte de red�finition)
//	Il est � noter que :  
//		-	TOUTES les fonctions de cette classes et de ses sous classes doivent �tre STATIC.
//		-	Cette classes et ses sous classes DOIVENT �tre abstraites 
//
//	E_commerce_Lib <: Profil_client_Lib			La librairie Profil_client_Lib est sous classe de E_commerce_Lib
//																					et est propre � l'e-commerce profil client
//
//	E_commerce_Lib <: E_commerce_Toto_Lib		La librairie E_commerce_Toto_Lib est sous classe de E_commerce_Lib
//																					et est propre � l'e-commerce Toto
//
//
abstract class E_commerce_Lib{
	
}