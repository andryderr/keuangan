@extends('new.attr.footer')
@extends('new.attr.header')
@extends('new.attr.head')


<?php $a = ""; ?>
<?php if (Auth::user()->poli->prefix == "PENDAF"): ?>
	<?php $a = 'new.pendaf.sidebar'; ?>		
<?php endif ?>
<?php if (Auth::user()->poli->kat_poli == "POLI"): ?>
	<?php $a = 'new.igd.sidebar'; ?>	
<?php endif ?>	
<?php if (Auth::user()->poli->kat_poli=="LAYANAN"): ?>
	<?php $a = "layanan.sidebar"; ?>
<?php endif ?>
<?php if (Auth::user()->poli->prefix == "PERSONALIA"): ?>
	<?php $a = "new.personalia.sidebar"; ?>
<?php endif ?>
<?php if (Auth::user()->poli->prefix == "FARMASI"): ?>
	<?php $a = "farmasi.sidebar"; ?>
<?php endif ?>
<?php if (Auth::user()->poli->prefix == "RWINAP"): ?>
	<?php $a = 'rawatInap.sidebar'; ?>
<?php endif ?>
<?php if (Auth::user()->poli->prefix == "KASIR"): ?>
	<?php $a = 'kasir.sidebar'; ?>
<?php endif ?>
<?php if (Auth::user()->poli->prefix == "KEUANGAN"): ?>
	<?php $a = 'keuangan.sidebar'; ?>
<?php endif ?>
@extends($a)
