@props(["type" => ""])

@php
    if($type === ""){
        $classString = "bg-slate-200 text-slate-800 border border-slate-200";
    }
        
    if($type === "primary"){
        $classString = "bg-blue-200 text-blue-800 border border-blue-200";
    }

    if($type === "success"){
        $classString = "bg-green-200 text-green-800 border border-green-200";
    }
     
    if($type === "warning"){
        $classString = "bg-orange-200 text-orange-800 border border-orange-200";
    }

    if($type === "danger"){
        $classString = "bg-red-200 text-red-800 border border-red-200";
    }
@endphp


<span {{ $attributes->merge(["class" => "$classString py-1 px-2 rounded-lg uppercase tracking-widest text-xs font-semibold"]) }}>{{ $slot }}</span>