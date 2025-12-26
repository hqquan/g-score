<!-- Student table -->
<div class="table-responsive">
    <table class="table table-striped table-sm">
        @if (isset($student))
            <thead>
                <tr>
                    <th>SBD</th>
                    <th>Toán</th>
                    <th>Ngữ văn</th>
                    <th>Ngoại ngữ</th>
                    <th>Vật lí</th>
                    <th>Hóa học</th>
                    <th>Sinh học</th>
                    <th>Lịch sử</th>
                    <th>Địa lí</th>
                    <th>GDCD</th>
                    <th>Mã ngoại ngữ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $student->sbd }}</td>
                    <td>{{ $student->toan }}</td>
                    <td>{{ $student->ngu_van }}</td>
                    <td>{{ $student->ngoai_ngu }}</td>
                    <td>{{ $student->vat_li }}</td>
                    <td>{{ $student->hoa_hoc }}</td>
                    <td>{{ $student->sinh_hoc }}</td>
                    <td>{{ $student->lich_su }}</td>
                    <td>{{ $student->dia_li }}</td>
                    <td>{{ $student->gdcd }}</td>
                    <td>{{ $student->ma_ngoai_ngu }}</td>
                </tr>
            </tbody>
        @elseif (isset($students) && $students->count() > 0)
            <thead>
                <tr>
                    <th>SBD</th>
                    <th>Toán</th>
                    <th>Vật lí</th>
                    <th>Hóa học</th>
                    <th>Tổng điểm</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->sbd }}</td>
                        <td>{{ $student->toan }}</td>
                        <td>{{ $student->vat_li }}</td>
                        <td>{{ $student->hoa_hoc }}</td>
                        <td>{{ $student->total_score}}</td>
                    </tr>
                @endforeach
            </tbody>
        @else
                </table>
            </div>
            <!-- Placeholder -->
            <div class="alert alert-light border">
                No data available.
            </div>
        @endif