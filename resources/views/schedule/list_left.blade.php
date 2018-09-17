@for($i=0;$i<\App\Schedule::getChildrenCount(1);$i++)
    <?php
    $currentId_a=\App\Schedule::getChildrenIdsArr(1)[$i];
    $rowspan_a=\App\Schedule::getCurrentRowspan($currentId_a);
    $content_a=\App\Schedule::getCurrentContent($currentId_a);
    ?>
    <tr>
        <td class="text-center" style="vertical-align: middle;background-color: #ffffff" rowspan="{{$rowspan_a}}">
            <span class="h4 text-danger">{{$content_a}}</span>
        </td>{{--上午班行--}}

        @for($j=0;$j<\App\Schedule::getChildrenCount($currentId_a);$j++)
            <?php
            $currentId_b=\App\Schedule::getChildrenIdsArr($currentId_a)[$j];
            $rowspan_b=\App\Schedule::getCurrentRowspan($currentId_b);
            $content_b=\App\Schedule::getCurrentContent($currentId_b);
            ?>
            <td class="text-center" style="vertical-align: middle;background-color: #ffffff" rowspan="{{$rowspan_b}}">
                <span class="h5 text-danger">{{$content_b}}</span>
            </td>{{--时间行--}}

            @for($k=0;$k<\App\Schedule::getChildrenCount($currentId_a);$k++)
                <?php
                $currentId_c=\App\Schedule::getChildrenIdsArr($currentId_b)[$k];
                $rowspan_c=\App\Schedule::getCurrentRowspan($currentId_c);
                $content_c=\App\Schedule::getCurrentContent($currentId_c);
                $childRenNum_c=\App\Schedule::getChildrenCount($currentId_c);
                ?>
                @if($childRenNum_c==0)
                    <td class="text-center" style="vertical-align: middle;background-color: #ffffff" rowspan="{{$rowspan_c}}">
                        <span class="h5 text-danger">{{$content_c}}</span>
                    </td>{{--科目行--}}
                    @if(isset($flag)&&$flag=='choose')
                    @else
                        <td class="text-center" style="vertical-align: middle;background-color: #ffffff" rowspan="{{$rowspan_c}}">
                            <a href="{{url('schedule/create',['Subjectid'=>$currentId_c])}}" style="text-decoration: none"><span class="label label-success">新增</span></a><br />
                        </td>
                    @endif
                    <td class="text-center" style="vertical-align: middle;background-color: #ffffff"><span class="h5">暂无..</span> </td>
                    {{--@include('schedule.list_right')--}}
                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                @else
                    <td class="text-center" style="vertical-align: middle;background-color: #ffffff" rowspan="{{$rowspan_c}}">
                        <span class="h5 text-danger">{{$content_c}}</span>
                    </td>{{--科目行--}}
                    @if(isset($flag)&&$flag=='choose')
                    @else
                        <td class="text-center" style="vertical-align: middle;background-color: #ffffff" rowspan="{{$rowspan_c}}">
                            <a href="{{url('schedule/create',['Subjectid'=>$currentId_c])}}" style="text-decoration: none"><span class="label label-success">新增</span></a><br />
                        </td>
                    @endif
                    @for($t=0;$t<\App\Schedule::getChildrenCount($currentId_c);$t++)
                        <?php
                        $currentId_d=\App\Schedule::getChildrenIdsArr($currentId_c)[$t];
                        $currentPeopleId_d=\App\Schedule::getCurrentContent($currentId_d);
                        $contentArr_d=\App\Schedule::getCurrentNameAndCard($currentPeopleId_d);
                        ?>
                        <td class="text-center" style="vertical-align: middle;background-color: #ffffff">
                            <a href="#" style="text-decoration: none" data-toggle="tooltip" title="工号:{{$contentArr_d[1]}}"><span class="label label-primary glyphicon glyphicon-user">
                                    {{$contentArr_d[0]}}</span></a>
                        </td>{{--老师行--}}
                       @include('schedule.list_right')
                    @endfor
                @endif
            @endfor
        @endfor
@endfor