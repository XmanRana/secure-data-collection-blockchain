<x-app-layout>
    <x-slot name="header"></x-slot>

    <div style="min-height: 100vh; background: linear-gradient(135deg, #d1fae5 0%, #dbeafe 50%, #e9d5ff 100%); display: flex; align-items: center; padding: 32px 16px;">
        <div style="max-width: 600px; width: 100%; margin: 0 auto;">
            
            <!-- Success Card -->
            <div class="card">
                
                <!-- Header with Success Animation -->
                <div class="card-header" style="text-align: center; padding: 48px 32px;">
                    <div style="font-size: 6rem; margin-bottom: 20px; animation: scaleIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);">✅</div>
                    <h1 style="font-size: 2.5rem; font-weight: 800; margin: 0; color: white;">Submission Successful!</h1>
                    <p style="color: rgba(255, 255, 255, 0.95); margin: 12px 0 0 0; font-size: 1.1rem;">Your data has been securely processed</p>
                </div>

                <!-- Content -->
                <div style="padding: 40px;">

                    <!-- Transaction ID -->
                    @if(session('transaction_id'))
                        <div style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(139, 92, 246, 0.05)); border: 2px solid #0066ff; border-radius: 12px; padding: 24px; margin-bottom: 24px; animation: slideInUp 0.6s ease-out 0.2s both;">
                            <p style="color: #6b7280; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin: 0;">🎟️ Transaction ID</p>
                            <p style="font-family: 'Courier New', monospace; font-size: 1.1rem; font-weight: 700; color: #0066ff; margin: 12px 0 0 0; word-break: break-all;">{{ session('transaction_id') }}</p>
                            <p style="color: #6b7280; font-size: 0.85rem; margin: 8px 0 0 0;">Save this ID for your records</p>
                        </div>
                    @endif

                    <!-- AI Confidence Score -->
                    @if(session('confidence_score'))
                        <div style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.05), rgba(236, 72, 153, 0.05)); border: 2px solid #7c3aed; border-radius: 12px; padding: 24px; margin-bottom: 24px; animation: slideInUp 0.6s ease-out 0.3s both;">
                            <p style="color: #6b7280; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin: 0;">🧠 AI Validation Confidence</p>
                            <div style="display: flex; align-items: flex-end; justify-content: space-between; margin-top: 16px; margin-bottom: 12px;">
                                <p style="font-size: 3rem; font-weight: 800; color: #7c3aed; margin: 0;">{{ session('confidence_score') }}%</p>
                                <span style="font-size: 0.95rem; color: #6b7280;">
                                    @if(session('confidence_score') >= 90)
                                        Excellent ⭐⭐⭐⭐⭐
                                    @elseif(session('confidence_score') >= 75)
                                        Good ⭐⭐⭐⭐
                                    @else
                                        Fair ⭐⭐⭐
                                    @endif
                                </span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ session('confidence_score') }}%;"></div>
                            </div>
                        </div>
                    @endif

                    <!-- Processing Steps -->
                    <div style="margin-bottom: 32px; animation: slideInUp 0.6s ease-out 0.4s both;">
                        <p style="color: #6b7280; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; margin: 0 0 16px 0;">✨ Processing Steps Completed</p>
                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            <div style="display: flex; align-items: flex-start; background: rgba(16, 185, 129, 0.08); padding: 16px; border-radius: 8px; border-left: 4px solid #10b981;">
                                <div style="font-size: 1.5rem; margin-right: 16px;">✅</div>
                                <div>
                                    <p style="font-weight: 700; color: #047857; margin: 0;">Data Validation</p>
                                    <p style="color: #059669; font-size: 0.9rem; margin: 4px 0 0 0;">AI-powered validation completed successfully</p>
                                </div>
                            </div>

                            <div style="display: flex; align-items: flex-start; background: rgba(59, 130, 246, 0.08); padding: 16px; border-radius: 8px; border-left: 4px solid #0066ff;">
                                <div style="font-size: 1.5rem; margin-right: 16px;">✅</div>
                                <div>
                                    <p style="font-weight: 700; color: #1e3a8a; margin: 0;">AES-256 Encryption</p>
                                    <p style="color: #1e40af; font-size: 0.9rem; margin: 4px 0 0 0;">Military-grade encryption applied</p>
                                </div>
                            </div>

                            <div style="display: flex; align-items: flex-start; background: rgba(139, 92, 246, 0.08); padding: 16px; border-radius: 8px; border-left: 4px solid #7c3aed;">
                                <div style="font-size: 1.5rem; margin-right: 16px;">✅</div>
                                <div>
                                    <p style="font-weight: 700; color: #5b21b6; margin: 0;">Blockchain Recording</p>
                                    <p style="color: #6d28d9; font-size: 0.9rem; margin: 4px 0 0 0;">Transaction recorded immutably on ledger</p>
                                </div>
                            </div>

                            <div style="display: flex; align-items: flex-start; background: rgba(245, 158, 11, 0.08); padding: 16px; border-radius: 8px; border-left: 4px solid #f59e0b;">
                                <div style="font-size: 1.5rem; margin-right: 16px;">✅</div>
                                <div>
                                    <p style="font-weight: 700; color: #92400e; margin: 0;">Database Storage</p>
                                    <p style="color: #b45309; font-size: 0.9rem; margin: 4px 0 0 0;">Data securely stored with redundancy</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <a href="{{ route('data.create') }}" class="btn btn-primary" style="text-align: center; justify-content: center;">
                            <span style="font-size: 1.25rem;">➕</span> Submit Another
                        </a>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary" style="text-align: center; justify-content: center;">
                            <span style="font-size: 1.25rem;">📊</span> View Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Info -->
            <div style="text-align: center; margin-top: 32px; color: #4b5563; font-size: 0.95rem;">
                <p style="margin: 0;">🔒 Your submission is protected with enterprise-grade security</p>
            </div>
        </div>
    </div>
</x-app-layout>