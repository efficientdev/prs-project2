<x-app-layout>

<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validations</title>
    <script src="https://cdn.tailwindcss.com"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .status-completed {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .status-in_progress {
            background-color: #dbeafe;
            color: #1e40af;
        }
        
        .status-rejected {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .status-draft {
            background-color: #e5e7eb;
            color: #374151;
        }
        
        .btn-primary {
            background-color: #4f46e5;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-primary:hover {
            background-color: #4338ca;
        }
        
        .btn-outline {
            border: 1px solid #d1d5db;
            color: #374151;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-outline:hover {
            background-color: #f9fafb;
            border-color: #9ca3af;
        }
    </style><!--
</head>-->
<div class="bg-gray-50">
    <div class="container mx-auto   ">
        <div class="mb-10  ">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Your Public Validations</h1>
            <p class="text-gray-600">Review and manage your validation requests</p>
        </div>
        <div class="space-y-6">
            @foreach($forms as $form)
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover border border-gray-100">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-file-alt text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 mb-1">
                                    <h3 class="text-lg font-semibold text-gray-900">Validation #{{ $form->id }}</h3>
                                    <span class="status-badge status-{{ $form->status }}">
                                        {{ ucwords(str_replace('_', ' ', $form->status)) }}
                                    </span>
                                </div>
                                <p class="text-gray-600">
                                    <i class="fas fa-university mr-1 text-gray-400"></i>
                                    {{ json_encode($form->data['sectionA']['school_name'] ?? 'Incomplete Form') }}
                                </p>
                                <div class="flex items-center mt-2 text-sm text-gray-500">
                                    <i class="far fa-clock mr-1"></i>
                                    Created {{ $form->created_at->format('M j, Y') }}
                                    @if($form->updated_at != $form->created_at)
                                    <span class="mx-2">•</span>
                                    <i class="fas fa-sync-alt mr-1"></i>
                                    Updated {{ $form->updated_at->format('M j, Y') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex space-x-3">
                            <a href="{{ route('public.validation.preview', ['form_id' => $form->id ?? 'default']) }}" 
                               class="btn-outline flex items-center space-x-2">
                                <i class="far fa-eye"></i>
                                <span>Summary</span>
                            </a>
                            <a href="{{ route('public.validation.sectionA.show', ['form_id' => $form->id ?? 'default']) }}" 
                               class="btn-primary flex items-center space-x-2">
                                <i class="fas fa-edit"></i>
                                <span>Review</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Progress bar for multi-step forms -->
                <div class="px-6 pb-4">
                    <div class="text-xs text-gray-500 mb-1">Form Completion</div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 
                            @if($form->status == 'completed') 100%
                            @elseif($form->status == 'in_progress') 65%
                            @elseif($form->status == 'pending') 30%
                            @else 10%
                            @endif">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Empty state -->
        @if(count($forms) == 0)
        <div class="text-center py-12">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                <i class="fas fa-inbox text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-1">No forms yet</h3>
            <p class="text-gray-500 max-w-md mx-auto">Get started by creating your first validation form.</p>
            <a href="{{route('public.validation.create')}}" class="btn-primary mt-4">
                <i class="fas fa-plus mr-2"></i> new Validation</a>
        </div>
        @else
        
        <div class="flex justify-end my-2">
            <a href="{{route('public.validation.create')}}" class="btn-primary mt-4">
                <i class="fas fa-plus mr-2"></i> new Validation</a>
        </div>
        @endif
    </div>

    <script>
        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card-hover');
            
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</div><!--
</html>-->


<!--
<div class="flex justify-between   py-3 px-1 items-center">
	<div class="text-3xl">Your Public Validations</div>
<a href="{{route('public.validation.create')}}" class="p-2 capitalize text-white bg-blue-500">new Validation</a>
</div>
<hr/>

<div>
@foreach($forms as $form)

<div class="flex justify-between shadow py-3 px-1 rounded">
	<div class="flex gap-5 items-center">
<div>Validation#{{$form->id}}</div>

<div>{{json_encode($form->data['sectionA']['school_name']??'Incomplete Form')}}</div></div>

<div>{{ucwords(str_replace('_', ' ', $form->status))}} {{$form->created_at}}</div>
</div>
<hr/>
<a href="{{ route('public.validation.preview', ['form_id' => $form->id ?? 'default']) }}" class="...">
		           Summary
		        </a>

<a href="{{ route('public.validation.sectionA.show', ['form_id' => $form->id ?? 'default']) }}" class="...">
		           Review
		        </a>
<hr/>

@endforeach
</div>
-->
<div class="min-w-[50vh]">
</div>
</x-app-layout>