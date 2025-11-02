<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-weight: 700; font-size: 1.875rem; color: #1f2937; margin: 0;">
                📊 Dashboard
            </h2>
            <a href="{{ route('data.create') }}" class="btn btn-primary">
                ➕ New Submission
            </a>
        </div>
    </x-slot>

    <div style="padding-top: 48px; background: linear-gradient(135deg, #f0f4ff 0%, #f5f0ff 100%); min-height: 100vh;">
        <div style="max-width: 1280px; margin: 0 auto; padding: 0 24px;">
            
            <!-- Stats Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px; margin-bottom: 32px;">
                
                <!-- Total Submissions -->
                <div class="stat-card" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(59, 130, 246, 0.05));">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                        <div>
                            <p class="stat-label">Total Submissions</p>
                            <p class="stat-value">{{ $stats['total_submissions'] }}</p>
                        </div>
                        <div class="stat-icon">📊</div>
                    </div>
                </div>

                <!-- Validated -->
                <div class="stat-card" style="background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                        <div>
                            <p class="stat-label">Validated</p>
                            <p class="stat-value" style="color: #10b981;">{{ $stats['validated'] }}</p>
                        </div>
                        <div class="stat-icon">✅</div>
                    </div>
                </div>

                <!-- Pending -->
                <div class="stat-card" style="background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(245, 158, 11, 0.05));">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                        <div>
                            <p class="stat-label">Pending Review</p>
                            <p class="stat-value" style="color: #f59e0b;">{{ $stats['pending_review'] }}</p>
                        </div>
                        <div class="stat-icon">⏳</div>
                    </div>
                </div>
            </div>

            <!-- Recent Submissions -->
            <div class="card">
                <div class="card-header">
                    <h3 style="margin: 0;">📋 Recent Submissions</h3>
                </div>

                @if($submissions->count() > 0)
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead style="background: #f3f4f6; border-bottom: 2px solid #e5e7eb;">
                                <tr>
                                    <th style="padding: 16px; text-align: left; font-weight: 700; color: #1f2937; font-size: 0.95rem;">ID</th>
                                    <th style="padding: 16px; text-align: left; font-weight: 700; color: #1f2937; font-size: 0.95rem;">Status</th>
                                    <th style="padding: 16px; text-align: left; font-weight: 700; color: #1f2937; font-size: 0.95rem;">AI Score</th>
                                    <th style="padding: 16px; text-align: left; font-weight: 700; color: #1f2937; font-size: 0.95rem;">Submitted</th>
                                    <th style="padding: 16px; text-align: left; font-weight: 700; color: #1f2937; font-size: 0.95rem;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($submissions as $submission)
                                    <tr style="border-bottom: 1px solid #e5e7eb; transition: all 0.3s ease;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background='white'">
                                        <td style="padding: 16px; color: #1f2937;">
                                            <span style="font-family: 'Courier New', monospace; font-weight: 700; color: #0066ff;">
                                                #{{ str_pad($submission->id, 8, '0', STR_PAD_LEFT) }}
                                            </span>
                                        </td>
                                        <td style="padding: 16px;">
                                            @if($submission->validation_status === 'validated')
                                                <span class="badge badge-success" style="display: inline-flex;">
                                                    <span style="margin-right: 6px;">✅</span> Validated
                                                </span>
                                            @else
                                                <span class="badge badge-warning" style="display: inline-flex;">
                                                    <span style="margin-right: 6px;">⏳</span> Review
                                                </span>
                                            @endif
                                        </td>
                                        <td style="padding: 16px;">
                                            <div style="display: flex; align-items: center; gap: 8px;">
                                                <div style="width: 80px; background: #e5e7eb; border-radius: 10px; height: 8px; overflow: hidden;">
                                                    <div style="background: linear-gradient(90deg, #0066ff, #7c3aed); height: 100%; border-radius: 10px; width: {{ $submission->ai_confidence_score ?? 0 }}%; transition: width 0.3s ease;"></div>
                                                </div>
                                                <span style="font-weight: 700; color: #1f2937; width: 40px; text-align: right;">{{ $submission->ai_confidence_score ?? 0 }}%</span>
                                            </div>
                                        </td>
                                        <td style="padding: 16px; color: #6b7280; font-size: 0.95rem;">
                                            @if($submission->created_at)
                                                {{ $submission->created_at->format('M d, Y') }}<br>
                                                <span style="font-size: 0.85rem;">{{ $submission->created_at->format('H:i:s') }}</span>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td style="padding: 16px;">
                                            <a href="{{ route('data.show', $submission) }}" class="btn btn-primary" style="padding: 8px 16px; font-size: 0.9rem;">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div style="padding: 24px; border-top: 1px solid #e5e7eb; background: #f9fafb;">
                        {{ $submissions->links() }}
                    </div>
                @else
                    <div style="padding: 64px 32px; text-align: center;">
                        <p style="font-size: 3rem; margin: 0;">📭</p>
                        <p style="color: #6b7280; font-weight: 600; margin: 16px 0;">No submissions yet</p>
                        <a href="{{ route('data.create') }}" class="btn btn-primary">
                            Create Your First Submission
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
