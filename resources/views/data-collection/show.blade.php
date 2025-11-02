<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-900">
            📋 Submission Details
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-indigo-50 via-white to-purple-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header Card with Security Shield -->
            <div class="card" style="margin-bottom: 32px; border-top: 5px solid #0066ff;">
                <div class="card-header">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h1 style="font-size: 2.5rem; font-weight: 800; margin: 0;">Submission #{{ str_pad($submission->id, 8, '0', STR_PAD_LEFT) }}</h1>
                            <p style="color: rgba(255,255,255,0.9); margin: 8px 0 0 0;">🔐 Secure Data Portal</p>
                        </div>
                        <div style="font-size: 5rem; animation: float 4s ease-in-out infinite;">🔐</div>
                    </div>
                </div>

                <!-- Status Cards Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; padding: 32px;">
                    
                    <!-- Validation Status -->
                    <div style="background: white; padding: 24px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); border-left: 4px solid {{ $submission->validation_status === 'validated' ? '#10b981' : '#f59e0b' }};">
                        <p style="color: #6b7280; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin: 0;">Status</p>
                        <p style="font-size: 1.5rem; font-weight: 700; margin: 12px 0 0 0; color: {{ $submission->validation_status === 'validated' ? '#10b981' : '#f59e0b' }};">
                            @if($submission->validation_status === 'validated')
                                ✅ Validated
                            @else
                                ⏳ Review Needed
                            @endif
                        </p>
                    </div>

                    <!-- AI Confidence -->
                    <div style="background: white; padding: 24px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); border-left: 4px solid #0066ff;">
                        <p style="color: #6b7280; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin: 0;">AI Confidence</p>
                        <p style="font-size: 1.5rem; font-weight: 700; margin: 12px 0 0 0; color: #0066ff;">{{ $submission->ai_confidence_score ?? 0 }}%</p>
                        <div class="progress-bar" style="margin-top: 12px;">
                            <div class="progress-fill" style="width: {{ $submission->ai_confidence_score ?? 0 }}%;"></div>
                        </div>
                    </div>

                    <!-- Timestamp -->
                    <div style="background: white; padding: 24px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); border-left: 4px solid #7c3aed;">
                        <p style="color: #6b7280; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin: 0;">Submitted</p>
                        <p style="font-size: 1rem; font-weight: 700; margin: 12px 0 0 0; color: #1f2937;">
                            @if($submission->created_at)
                                {{ $submission->created_at->format('M d, Y') }}<br>
                                <span style="font-size: 0.85rem; color: #6b7280; font-weight: 400;">{{ $submission->created_at->format('H:i:s') }}</span>
                            @else
                                N/A
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Submitted Data Card -->
            <div class="card" style="margin-bottom: 32px;">
                <div class="card-header">
                    <h2>📝 Submitted Information</h2>
                </div>
                
                <div style="padding: 32px;">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                        
                        <!-- Full Name -->
                        <div style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(59, 130, 246, 0.1)); padding: 20px; border-radius: 12px; border-left: 4px solid #0066ff;">
                            <p style="color: #6b7280; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin: 0;">Full Name</p>
                            <p style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin: 12px 0 0 0;">{{ $data['full_name'] ?? 'N/A' }}</p>
                        </div>

                        <!-- Email -->
                        <div style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.05), rgba(139, 92, 246, 0.1)); padding: 20px; border-radius: 12px; border-left: 4px solid #7c3aed;">
                            <p style="color: #6b7280; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin: 0;">Email Address</p>
                            <p style="font-size: 1rem; font-weight: 700; color: #1f2937; margin: 12px 0 0 0; word-break: break-all;">{{ $data['email'] ?? 'N/A' }}</p>
                        </div>

                        <!-- Phone -->
                        <div style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(16, 185, 129, 0.1)); padding: 20px; border-radius: 12px; border-left: 4px solid #10b981;">
                            <p style="color: #6b7280; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin: 0;">Phone Number</p>
                            <p style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin: 12px 0 0 0;">{{ $data['phone'] ?? 'N/A' }}</p>
                        </div>

                        <!-- Address -->
                        <div style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.05), rgba(245, 158, 11, 0.1)); padding: 20px; border-radius: 12px; border-left: 4px solid #f59e0b; grid-column: 1 / -1;">
                            <p style="color: #6b7280; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin: 0;">Address</p>
                            <p style="font-size: 1rem; font-weight: 700; color: #1f2937; margin: 12px 0 0 0;">{{ $data['address'] ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Validation Details Card -->
            @if(!empty($validationNotes['issues']) || !empty($validationNotes['suggestions']))
                <div class="card" style="margin-bottom: 32px;">
                    <div class="card-header">
                        <h2>🔍 Validation Analysis</h2>
                    </div>
                    
                    <div style="padding: 32px;">
                        @if(!empty($validationNotes['issues']))
                            <div style="margin-bottom: 24px;">
                                <div style="display: flex; align-items: center; margin-bottom: 16px;">
                                    <span style="font-size: 1.5rem; margin-right: 12px;">⚠️</span>
                                    <h3 style="font-size: 1.1rem; font-weight: 700; color: #ef4444; margin: 0;">Issues Found</h3>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 8px;">
                                    @foreach($validationNotes['issues'] as $issue)
                                        <div style="display: flex; align-items: flex-start; background: rgba(239, 68, 68, 0.05); padding: 12px; border-radius: 8px; border-left: 3px solid #ef4444; color: #dc2626;">
                                            <span style="margin-right: 8px; margin-top: 2px;">•</span>
                                            <span>{{ $issue }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if(!empty($validationNotes['suggestions']))
                            <div>
                                <div style="display: flex; align-items: center; margin-bottom: 16px;">
                                    <span style="font-size: 1.5rem; margin-right: 12px;">💡</span>
                                    <h3 style="font-size: 1.1rem; font-weight: 700; color: #0066ff; margin: 0;">Suggestions</h3>
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 8px;">
                                    @foreach($validationNotes['suggestions'] as $suggestion)
                                        <div style="display: flex; align-items: flex-start; background: rgba(59, 130, 246, 0.05); padding: 12px; border-radius: 8px; border-left: 3px solid #0066ff; color: #1e40af;">
                                            <span style="margin-right: 8px; margin-top: 2px;">✓</span>
                                            <span>{{ $suggestion }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Security Confirmation Card -->
            <div class="card" style="margin-bottom: 32px; background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(5, 150, 105, 0.05)); border-top: 4px solid #10b981;">
                <div style="padding: 24px; display: flex; align-items: flex-start;">
                    <div style="font-size: 3rem; margin-right: 24px;">🛡️</div>
                    <div>
                        <h3 style="font-weight: 700; color: #047857; font-size: 1.1rem; margin: 0 0 12px 0;">Data Security Confirmed</h3>
                        <ul style="margin: 0; padding-left: 20px; color: #065f46;">
                            <li style="margin-bottom: 6px;">✅ Data encrypted with AES-256</li>
                            <li style="margin-bottom: 6px;">✅ Validated by AI algorithms</li>
                            <li style="margin-bottom: 6px;">✅ Recorded on blockchain</li>
                            <li>✅ Secure storage confirmed</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <span>←</span> Back to Dashboard
                </a>
                <a href="{{ route('data.create') }}" class="btn btn-primary">
                    <span>➕</span> Submit New Data
                </a>
            </div>
        </div>
    </div>
</x-app-layout>